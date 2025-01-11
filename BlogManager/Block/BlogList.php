<?php
declare(strict_types=1);
namespace Shezo\BlogManager\Block;

use Magento\Customer\Model\SessionFactory;
use Magento\Framework\View\Element\Template;

class BlogList extends Template
{
    /**
     * @var \Shezo\BlogManager\Model\ResourceModel\Blog\CollectionFactory
     */
    protected $blogCollection;

    /**
     * @var Magento\Customer\Model\SessionFactory
     */
    protected $customerSession;

    /**
     * Dependency Initilization
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Shezo\BlogManager\Model\ResourceModel\Blog\CollectionFactory $blogCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Shezo\BlogManager\Model\ResourceModel\Blog\CollectionFactory $blogCollection,
        SessionFactory $customerSession,
        array $data = []
    ) {
        $this->blogCollection = $blogCollection;
        $this->customerSession = $customerSession;
        parent::__construct($context, $data);
    }

    /**
     * Get Blog List
     *
     * @return \Shezo\BlogManager\Model\ResourceModel\Blog\Collection
     */
    public function getBlogs()
    {
        $customerId = $this->customerSession->create()->getCustomer()->getId();
        $collection = $this->blogCollection->create();
        $collection->addFieldToFilter('user_id', ['eq'=>$customerId])->setOrder('updated_at', 'DESC')   ;
        return $collection;
    }
}
