<?php
namespace Shezo\JobManager\Model\ResourceModel\Job;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'job_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Shezo\JobManager\Model\Job::class,
            \Shezo\JobManager\Model\ResourceModel\Job::class
        );
    }
}
