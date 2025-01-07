<?php

declare(strict_types=1);

namespace  Shezo\FirstModel\Controller\Manage;

use Magento\Framework\App\Action\Action;
class Hello extends Action
{

    public function execute()
    {
            echo  'Hello World!';
    }
}
