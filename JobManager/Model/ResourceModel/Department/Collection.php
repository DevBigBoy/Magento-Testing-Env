<?php
namespace Shezo\JobManager\Model\ResourceModel\Department;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'department_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Shezo\JobManager\Model\Department::class,
            \Shezo\JobManager\Model\ResourceModel\Department::class
        );
    }
}
