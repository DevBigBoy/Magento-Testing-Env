<?php

namespace Shezo\VirtualTypeExample\ViewModel;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Shezo\VirtualTypeExample\Api\WarehouseRepositoryInterface;

class Example implements ArgumentInterface
{
    public function __construct(
        protected readonly WarehouseRepositoryInterface $warehouseRepository,
    ){}

    public function getWarehouse(RequestInterface $request){
            return $this->warehouseRepository->newWarehouse( (string) $request->getParam('code'));
    }
}
