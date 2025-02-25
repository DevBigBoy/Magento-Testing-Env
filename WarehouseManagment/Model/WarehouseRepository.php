<?php

declare(strict_types=1);

namespace Shezo\VirtualTypeExample\Model;

use Magento\Framework\DataObject;
use Shezo\VirtualTypeExample\Api\WarehouseManagementInterface;
use Shezo\VirtualTypeExample\Api\WarehouseRepositoryInterface;

class WarehouseRepository implements WarehouseRepositoryInterface
{

    public function __construct(
        protected readonly  WarehouseManagementInterface $warehouseManagement,
    ){}

    public function newWarehouse(string $code): DataObject
    {
        return new DataObject($this->warehouseManagement->getWarehouseInfo($code));
    }
}
