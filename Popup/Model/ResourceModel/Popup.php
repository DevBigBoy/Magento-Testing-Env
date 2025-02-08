<?php
declare(strict_types=1);
namespace Shezo\Popup\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Shezo\Popup\Api\Data\PopupInterface;

class Popup extends AbstractDb implements PopupInterface
{

    protected function _construct()
    {
        $this->_init(
            PopupInterface::TABLE_NAME,
            PopupInterface::ID
        );
    }
}
