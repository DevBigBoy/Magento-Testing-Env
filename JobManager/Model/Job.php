<?php
namespace Shezo\JobManager\Model;

use Magento\Framework\Model\AbstractModel;
use Shezo\JobManager\Api\Data\JobInterface;

class Job extends AbstractModel implements JobInterface
{
    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(\Shezo\JobManager\Model\ResourceModel\Job::class);
    }

    /**
     * @inheritDoc
     */
    public function getJobId()
    {
        return $this->getData(self::JOB_ID);
    }

    /**
     * @inheritDoc
     */
    public function setJobId($jobId)
    {
        return $this->setData(self::JOB_ID, $jobId);
    }

    /**
     * @inheritDoc
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * @inheritDoc
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * @inheritDoc
     */
    public function getLocation()
    {
        return $this->getData(self::LOCATION);
    }

    /**
     * @inheritDoc
     */
    public function setLocation($location)
    {
        return $this->setData(self::LOCATION, $location);
    }

    /**
     * @inheritDoc
     */
    public function getType()
    {
        return $this->getData(self::TYPE);
    }

    /**
     * @inheritDoc
     */
    public function setType($type)
    {
        return $this->setData(self::TYPE, $type);
    }

    /**
     * @inheritDoc
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * @inheritDoc
     */
    public function getIsActive()
    {
        return (bool)$this->getData(self::IS_ACTIVE);
    }

    /**
     * @inheritDoc
     */
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * @inheritDoc
     */
    public function getDepartmentId()
    {
        return $this->getData(self::DEPARTMENT_ID);
    }

    /**
     * @inheritDoc
     */
    public function setDepartmentId($departmentId)
    {
        return $this->setData(self::DEPARTMENT_ID, $departmentId);
    }
}
