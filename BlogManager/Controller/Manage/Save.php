<?php

namespace Shezo\BlogManager\Controller\Manage;

use Magento\Customer\Controller\AbstractAccount;
use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\Session;
class Save extends AbstractAccount
{
    /**
     * @var \Shezo\BlogManager\Model\BlogFactory
     */
    protected $blogFactory;
    /**
     * Dependency Initilization
     *
     * @param Context $context
     * @param \Shezo\BlogManager\Model\BlogFactory $blogFactory
     */

    /**
     * @var Magento\Customer\Model\Session
     */
    protected $customerSession;
    /**
     * @var \Magento\Framework\Message\ManagerInterface
     */
    protected $messageManager;
    public function __construct(
        Context $context,
        \Shezo\BlogManager\Model\BlogFactory $blogFactory,
        Session $customerSession,
        \Magento\Framework\Message\ManagerInterface $messageManager
    ) {
        $this->blogFactory = $blogFactory;
        $this->messageManager = $messageManager;
        parent::__construct($context);
        $this->customerSession = $customerSession;
    }
    /**
     * Provides content
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $model = $this->blogFactory->create();
        $model->setTitle($data['title']);
        $model->setContent($data['content']);
        $model->setData($data);

        $customer = $this->customerSession->getCustomer();
        $customerId = $customer->getId();
        $model->setUserId($customerId);

        $model->save();

        $this->messageManager->addSuccess(__('Blog saved successfully.'));
        return $this->resultRedirectFactory->create()->setPath('blog/manage');
    }
}
