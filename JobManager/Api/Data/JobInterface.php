<?php
namespace Shezo\JobManager\Api\Data;

interface JobInterface
{
    /**
     * Constants for keys of data array
     */
    const JOB_ID = 'job_id';
    const TITLE = 'title';
    const LOCATION = 'location';
    const TYPE = 'type';
    const DESCRIPTION = 'description';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const IS_ACTIVE = 'is_active';
    const DEPARTMENT_ID = 'department_id';

    /**
     * Get Job ID
     *
     * @return int|null
     */
    public function getJobId();

    /**
     * Set Job ID
     *
     * @param int $jobId
     * @return $this
     */
    public function setJobId($jobId);

    /**
     * Get Job Title
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set Job Title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * Get Job Location
     *
     * @return string
     */
    public function getLocation();

    /**
     * Set Job Location
     *
     * @param string $location
     * @return $this
     */
    public function setLocation($location);

    /**
     * Get Job Type
     *
     * @return string
     */
    public function getType();

    /**
     * Set Job Type
     *
     * @param string $type
     * @return $this
     */
    public function setType($type);

    /**
     * Get Job Description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set Job Description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * Get Creation Time
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * Set Creation Time
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * Get Update Time
     *
     * @return string
     */
    public function getUpdatedAt();

    /**
     * Set Update Time
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);

    /**
     * Get Is Active
     *
     * @return bool
     */
    public function getIsActive();

    /**
     * Set Is Active
     *
     * @param bool $isActive
     * @return $this
     */
    public function setIsActive($isActive);

    /**
     * Get Department ID
     *
     * @return int
     */
    public function getDepartmentId();

    /**
     * Set Department ID
     *
     * @param int $departmentId
     * @return $this
     */
    public function setDepartmentId($departmentId);
}
