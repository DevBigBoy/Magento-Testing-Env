<?php

declare(strict_types=1);

namespace Shezo\ShipmentAttributes\Api\Data;


interface AttributesInterface
{
    public function getShipmentId(): int;
    public function getCarrier(): string;
    public function getCost(): float;
    public function getDeliveryDate(): string;
}
