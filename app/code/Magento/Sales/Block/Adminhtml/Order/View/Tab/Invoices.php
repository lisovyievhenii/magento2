<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Sales\Block\Adminhtml\Order\View\Tab;

/**
 * Order Invoices grid
 *
 * @api
 * @since 100.0.2
 */
class Invoices extends AbstractTab
{
    /**
     * @var string
     */
    protected $resourceId = 'Magento_Sales::invoice';

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Invoices');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Order Invoices');
    }
}
