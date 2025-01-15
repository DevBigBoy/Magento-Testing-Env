<?php

namespace Shezo\BlogManager\Controller\Manage;

use Magento\Customer\Controller\AbstractAccount;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Customer\Model\Session;
use Shezo\BlogManager\Model\BlogFactory;

class Edit extends AbstractAccount
{
    /**
     * @var Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var BlogFactory
     */
    protected $blogFactory;

    /**
     * @var Magento\Customer\Model\Session
     */
    protected $customerSession;

    /**
     * @var ManagerInterface
     */
    protected $messageManager;

    /**
     * Dependency Initilization
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param BlogFactory $blogFactory
     * @param Session $customerSession
     * @param ManagerInterface $messageManager
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        BlogFactory $blogFactory,
        Session $customerSession,
        ManagerInterface $messageManager
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->blogFactory = $blogFactory;
        $this->customerSession = $customerSession;
        $this->messageManager = $messageManager;
        parent::__construct($context);
    }

    /**
     * Provides content
     *
     * @return Magento\Framework\View\Result\Page
     * @return Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $blogId = $this->getRequest()->getParam('id');
        $customerId = $this->customerSession->getCustomerId();
        $isAuthorised = $this->blogFactory->create()
            ->getCollection()
            ->addFieldToFilter('user_id', $customerId)
            ->addFieldToFilter('entity_id', $blogId)
            ->getSize();
        if (!$isAuthorised) {
            $this->messageManager->addError(__('You are not authorised to edit this blog.'));
            return $this->resultRedirectFactory->create()->setPath('blog/manage');
        }

        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('Edit Blog'));
        $layout = $resultPage->getLayout();
        return $resultPage;
    }
}
