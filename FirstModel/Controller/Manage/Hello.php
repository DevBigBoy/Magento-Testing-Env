<?php

declare(strict_types=1);

namespace  Shezo\FirstModel\Controller\Manage;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Shezo\FirstModel\NotMagento\PencilInterface;

class Hello extends Action  implements HttpGetActionInterface, HttpPostActionInterface
{

    public function __construct(
        Context $context,
       private readonly PencilInterface $pencil,
    )
    {
        parent::__construct($context);
    }
    public function execute()
    {
        echo  $this->pencil->getPencilType();
    }
}
