<?php

namespace Shezo\Popup\Model\ResourceModel\Popup;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Shezo\Popup\Model\Popup AS ModelPopup;
use Shezo\Popup\Model\ResourceModel\Popup as ResourcePopup;
class Collection extends AbstractCollection
{

    public function _construct()
    {
        $this->_init(
          ModelPopup::class,
            ResourcePopup::class
        );
    }
}
