<?php

declare(strict_types=1);

namespace  Shezo\FirstModel\Controller\Manage;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Shezo\FirstModel\Api\PencilInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Shezo\FirstModel\Model\Book;
use Shezo\FirstModel\Model\Pencil;

class Hello extends Action  implements HttpGetActionInterface, HttpPostActionInterface
{

    public function __construct(
        Context $context,
       protected readonly ProductRepositoryInterface $productRepository,
       protected readonly PencilInterface $pencil,
    )
    {
        parent::__construct($context);
    }
    public function execute()
    {
//        echo  $this->pencil->getPencilType( );
//        echo get_class($this->productRepository);

//        echo 'Hello world!';

        echo $this->pencil->getPencilType();
        // For Learning Purpose
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $pencil = $objectManager->create(Pencil::class);
        $book = $objectManager->create(Book::class);
        echo '<pre>';
        var_dump($pencil);
        echo '</pre>';

        echo '<pre>';
        var_dump($book);
        echo '</pre>';
    }
}
