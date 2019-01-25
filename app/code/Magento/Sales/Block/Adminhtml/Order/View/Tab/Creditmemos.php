<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Sales\Block\Adminhtml\Order\View\Tab;

/**
 * Order Credit Memos grid
 *
 * @api
 * @since 100.0.2
 */
class Creditmemos extends AbstractTab
{
    /**
     * @var string
     */
    protected $resourceId = 'Magento_Sales::creditmemo';

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Credit Memos');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Order Credit Memos');
    }
}
