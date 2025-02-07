<?php

namespace Shezo\CancelOrder\Controller\Adminhtml\Cancelorder;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    const ADMIN_RESOURCE = 'Shezo_CancelOrder::cancel_order_requests'; // Ensure ACL is applied

    protected $resultPageFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Shezo_CancelOrder::cancel_order_requests');
        $resultPage->getConfig()->getTitle()->prepend(__('Cancel Order Requests'));

        return $resultPage;
    }
}
