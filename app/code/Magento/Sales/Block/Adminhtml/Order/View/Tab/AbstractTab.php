<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Sales\Block\Adminhtml\Order\View\Tab;

abstract class AbstractTab extends \Magento\Framework\View\Element\Text\ListText implements
    \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var string
     */
    protected $resourceId = '';

    /**
     * @var \Magento\Framework\AuthorizationInterface
     */
    protected $_authorization;

    /**
     * Invoices constructor.
     *
     * @param \Magento\Framework\View\Element\Context $context
     * @param \Magento\Framework\AuthorizationInterface $authorization
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Context $context,
        \Magento\Framework\AuthorizationInterface $authorization,
        array $data = []
    ) {
        $this->_authorization = $authorization;
        parent::__construct($context, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return $this->_authorization->isAllowed($this->resourceId);
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return !$this->_authorization->isAllowed($this->resourceId);
    }
}