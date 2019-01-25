<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Sales\Block\Adminhtml\Order\View\Tab;

/**
 * Order transactions tab
 *
 * @api
 * @since 100.0.2
 */
class Transactions extends AbstractTab
{
    /**
     * @var string
     */
    protected $resourceId = 'Magento_Sales::transactions_fetch';

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Framework\View\Element\Context $context
     * @param \Magento\Framework\AuthorizationInterface $authorization
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Context $context,
        \Magento\Framework\AuthorizationInterface $authorization,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $authorization, $data);
    }

    /**
     * Retrieve order model instance
     *
     * @return \Magento\Sales\Model\Order
     */
    public function getOrder()
    {
        return $this->_coreRegistry->registry('current_order');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Transactions');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Transactions');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return !$this->getOrder()->getPayment()->getMethodInstance()->isOffline() && parent::canShowTab();
    }
}
