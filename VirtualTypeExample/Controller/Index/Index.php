<?php

namespace Shezo\VirtualTypeExample\Controller\Index;


use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements ActionInterface
{
    public function __Construct(
        protected  readonly PageFactory $resultPageFactory,
    ){}

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set('Virtual Types in Magento 2');
        return $resultPage;
    }
}
