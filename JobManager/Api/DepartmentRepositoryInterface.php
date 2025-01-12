<?php
namespace Shezo\JobManager\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Shezo\JobManager\Api\Data\DepartmentInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

interface DepartmentRepositoryInterface
{
    /**
     * Save department.
     *
     * @param DepartmentInterface $department
     * @return DepartmentInterface
     * @throws LocalizedException
     */
    public function save(DepartmentInterface $department);

    /**
     * Retrieve department.
     *
     * @param int $departmentId
     * @return DepartmentInterface
     * @throws NoSuchEntityException
     */
    public function getById($departmentId);

    /**
     * Retrieve departments matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Shezo\JobManager\Api\Data\DepartmentSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete department.
     *
     * @param DepartmentInterface $department
     * @return bool true on success
     * @throws LocalizedException
     */
    public function delete(DepartmentInterface $department);

    /**
     * Delete department by ID.
     *
     * @param int $departmentId
     * @return bool true on success
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById($departmentId);
}
