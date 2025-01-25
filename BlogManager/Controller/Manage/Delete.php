<?php

namespace Shezo\BlogManager\Controller\Manage;

use Magento\Customer\Controller\AbstractAccount;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Message\ManagerInterface;
use Shezo\BlogManager\Block\BlogFactory;
class Delete extends AbstractAccount
{
    protected $messageManager;
    public function __construct(
        Context $context,
     private readonly BlogFactory $blogFactory,
     private readonly Session $session,
      ManagerInterface $messageManager
    )
    {
        $this->messageManager = $messageManager;
        parent::__construct($context);
    }
    public function execute()
    {
        $blogId = $this->getRequest()->getParam('id');
        $customerId = $this->session->getCustomerId();

        dd($customerId, $blogId);

//        $isAuthorized  = $this->blogFactory->create()
//            ->getCollection()
//            ->addAttributeToFilter('customer_id', ['eq' => $customerId])
//            ->addAttributeToFilter('blog_id', $blogId)
//            ->getSize();

        if (!$isAuthorized) {
            $this->messageManager->addError(__('You are not authorised to delete this blog.'));
            return $this->resultRedirectFactory->create()->setPath('blog/manage');
        }

        $blog = $this->blogFactory->create();
        $blog->load($blogId)->delete();

        $this->messageManager->addSuccess(__('You have Successfully deleted the blog.'));

        return $this->resultRedirectFactory->create()->setPath('blog/manage');
    }
}
