<?php
namespace Shezo\BlogManager\Controller\Manage;

use Magento\Customer\Controller\AbstractAccount;
use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\Session;
use Magento\Framework\Message\ManagerInterface;
use Shezo\BlogManager\Model\BlogFactory;

class Save extends AbstractAccount
{
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
     * @param BlogFactory $blogFactory
     * @param Session $customerSession
     * @param ManagerInterface $messageManager
     */
    public function __construct(
        Context $context,
        BlogFactory $blogFactory,
        Session $customerSession,
        ManagerInterface $messageManager
    ) {
        $this->blogFactory = $blogFactory;
        $this->customerSession = $customerSession;
        $this->messageManager = $messageManager;
        parent::__construct($context);
    }

    /**
     * Provides content
     *
     * @return Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $customerId = $this->customerSession->getCustomerId();
        if (isset($data['id']) && $data['id']) {
            $isAuthorised = $this->blogFactory->create()
                ->getCollection()
                ->addFieldToFilter('user_id', $customerId)
                ->addFieldToFilter('entity_id', $data['id'])
                ->getSize();
            if (!$isAuthorised) {
                $this->messageManager->addError(__('You are not authorised to edit this blog.'));
                return $this->resultRedirectFactory->create()->setPath('blog/manage');
            } else {
                $model = $this->blogFactory->create()->load($data['id']);
                $model->setTitle($data['title'])
                    ->setContent($data['content'])
                    ->save();
                $this->messageManager->addSuccess(__('You have updated the blog successfully.'));
            }
        } else {
            $model = $this->blogFactory->create();
            $model->setData($data);
            $model->setUserId($customerId);
            $model->save();
            $this->messageManager->addSuccess(__('Blog saved successfully.'));
        }
        return $this->resultRedirectFactory->create()->setPath('blog/manage');
    }
}
