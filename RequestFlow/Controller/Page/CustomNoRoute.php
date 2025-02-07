<?php

namespace Shezo\RequestFlow\Controller\Page;

use Magento\Framework\App\Action\Action;

class CustomNoRoute extends Action
{
    public function execute()
    {
        echo 'Hello World';
    }
}
