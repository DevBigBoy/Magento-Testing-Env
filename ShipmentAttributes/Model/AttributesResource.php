<?php

declare(strict_types=1);

namespace Shezo\ShipmentAttributes\Model;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class AttributesResource extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('shezo_shipment_attributes', 'entity_id');
    }
}
