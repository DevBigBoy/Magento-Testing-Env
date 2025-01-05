<?php

declare(strict_types=1);

namespace Shezo\ShipmentAttributes\Api;

use Shezo\ShipmentAttributes\Api\Data\AttributesInterface;

interface ManagementInterface
{

    /**
     * @param int $shipmentId
     * @return AttributesInterface
     */
    public function getByShipmentId(int $shipmentId): AttributesInterface;
}
