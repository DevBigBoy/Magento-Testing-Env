<?php

namespace Shezo\BlogManager\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Shezo\BlogManager\Model\BlogFactory;

class Blog extends Template
{
    /**
     * @var BlogFactory
     */
    protected $blogFactory;

    /**
     * Dependency Initilization
     *
     * @param Context $context
     * @param BlogFactory $blogFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        BlogFactory $blogFactory,
        array $data = []
    ) {
        $this->blogFactory = $blogFactory;
        parent::__construct($context, $data);
    }

    /**
     * Get Blog
     *
     * @return \Shezo\BlogManager\Model\Blog
     */
    public function getBlog()
    {
        $blogId = $this->getRequest()->getParam('id');
        return $this->blogFactory->create()->load($blogId);
    }
}
