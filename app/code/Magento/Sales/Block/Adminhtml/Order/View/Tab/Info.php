<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Sales\Block\Adminhtml\Order\View\Tab;

/**
 * Order information tab
 *
 * @api
 * @author      Magento Core Team <core@magentocommerce.com>
 * @since 100.0.2
 */
class Info extends \Magento\Sales\Block\Adminhtml\Order\AbstractOrder implements
    \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var string
     */
    protected $resourceId = 'Magento_Sales::actions_view';

    /**
     * @var \Magento\Framework\AuthorizationInterface
     */
    protected $_authorization;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Sales\Helper\Admin $adminHelper,
        \Magento\Framework\AuthorizationInterface $authorization,
        array $data = []
    ) {
        $this->_authorization = $authorization;
        parent::__construct($context, $registry, $adminHelper, $data);
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
     * Retrieve source model instance
     *
     * @return \Magento\Sales\Model\Order
     */
    public function getSource()
    {
        return $this->getOrder();
    }

    /**
     * Retrieve order totals block settings
     *
     * @return array
     */
    public function getOrderTotalData()
    {
        return [
            'can_display_total_due' => true,
            'can_display_total_paid' => true,
            'can_display_total_refunded' => true
        ];
    }

    /**
     * Get order info data
     *
     * @return array
     */
    public function getOrderInfoData()
    {
        return ['no_use_order_link' => true];
    }

    /**
     * Get tracking html
     *
     * @return string
     */
    public function getTrackingHtml()
    {
        return $this->getChildHtml('order_tracking');
    }

    /**
     * Get items html
     *
     * @return string
     */
    public function getItemsHtml()
    {
        return $this->getChildHtml('order_items');
    }

    /**
     * Retrieve gift options container block html
     *
     * @return string
     */
    public function getGiftOptionsHtml()
    {
        return $this->getChildHtml('gift_options');
    }

    /**
     * Get payment html
     *
     * @return string
     */
    public function getPaymentHtml()
    {
        return $this->getChildHtml('order_payment');
    }

    /**
     * View URL getter
     *
     * @param int $orderId
     * @return string
     */
    public function getViewUrl($orderId)
    {
        return $this->getUrl('sales/*/*', ['order_id' => $orderId]);
    }

    /**
     * ######################## TAB settings #################################
     */

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Information');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Order Information');
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
