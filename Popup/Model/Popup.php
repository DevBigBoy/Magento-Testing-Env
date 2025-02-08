<?php

namespace Shezo\Popup\Model;

use Magento\Framework\Model\AbstractModel;
use Shezo\Popup\Api\Data\PopupInterface;
use Shezo\Popup\Model\ResourceModel\Popup as ResourcePopup;
class Popup extends AbstractModel implements PopupInterface
{
    public function _construct()
    {
        $this->_init(
            ResourcePopup::class
        );
    }

}
