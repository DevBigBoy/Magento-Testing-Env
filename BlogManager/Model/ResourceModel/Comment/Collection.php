<?php

namespace Shezo\BlogManager\Model\ResourceModel\Comment;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * Dependency Initilization
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(
            \Shezo\BlogManager\Model\Comment::class,
            \Shezo\BlogManager\Model\ResourceModel\Comment::class
        );
        $this->_map['fields']['entity_id'] = 'main_table.entity_id';
    }
}
