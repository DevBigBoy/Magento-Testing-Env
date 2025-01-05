<?php

declare(strict_types=1);

namespace Shezo\ShipmentAttributes\Service;

use Shezo\ShipmentAttributes\Api\Data\AttributesInterface;
use Shezo\ShipmentAttributes\Api\ManagementInterface;
use Shezo\ShipmentAttributes\Model\AttributesFactory;
use Shezo\ShipmentAttributes\Model\AttributesResource;

class Management implements ManagementInterface
{
    /**
     * @var AttributesResource
     */
    private $resource;

    /**
     * @var AttributesFactory
     */
    private $factory;

    /**
     * Management constructor.
     * @param AttributesResource $resource
     */
    public function __construct(
        AttributesResource $resource,
        AttributesFactory $attributesFactory
    ) {
        $this->resource = $resource;
        $this->factory = $attributesFactory;
    }

    /**
     * @param int $shipmentId
     * @return AttributesInterface
     */
    public function getByShipmentId(int $shipmentId): AttributesInterface
    {
        $object = $this->getNewInstance();
        $this->resource->load($object, $shipmentId, 'shipment_id');

        return $object;
    }

    public function getNewInstance(): AttributesInterface
    {
        return $this->factory->create();
    }
}
