<?php

namespace Shezo\JobManager\Api\Data;

interface DepartmentInterface
{
    /**
     * Constants for keys of data array
     */
    const DEPARTMENT_ID = 'department_id';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const IS_ACTIVE = 'is_active';

    /**
     * Get Department ID
     *
     * @return int|null
     */
    public function getDepartmentId();

    /**
     * Set Department ID
     *
     * @param int $departmentId
     * @return $this
     */
    public function setDepartmentId($departmentId);

    /**
     * Get Department Name
     *
     * @return string
     */
    public function getName();

    /**
     * Set Department Name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Get Department Description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set Department Description
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
}
