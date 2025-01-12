<?php
namespace Shezo\JobManager\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Shezo\JobManager\Api\Data\JobInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

interface JobRepositoryInterface
{
    /**
     * Save job.
     *
     * @param JobInterface $job
     * @return JobInterface
     * @throws LocalizedException
     */
    public function save(JobInterface $job);

    /**
     * Retrieve job.
     *
     * @param int $jobId
     * @return JobInterface
     * @throws NoSuchEntityException
     */
    public function getById($jobId);

    /**
     * Retrieve jobs matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Shezo\JobManager\Api\Data\JobSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete job.
     *
     * @param JobInterface $job
     * @return bool true on success
     * @throws LocalizedException
     */
    public function delete(JobInterface $job);

    /**
     * Delete job by ID.
     *
     * @param int $jobId
     * @return bool true on success
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById($jobId);
}
