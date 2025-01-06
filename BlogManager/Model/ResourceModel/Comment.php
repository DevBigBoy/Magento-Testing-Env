<?php

declare(strict_types=1);

namespace Shezo\BlogManager\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Comment extends AbstractDb
{
    /**
     * Dependency Initilization
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init("shezo_blogmanager_comment", "entity_id");
    }
}
