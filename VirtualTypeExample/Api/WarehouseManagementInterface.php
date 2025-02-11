<?php

namespace Shezo\VirtualTypeExample\Api;

interface WarehouseManagementInterface
{
    public function getWarehouseInfo(string $code): array;
}
