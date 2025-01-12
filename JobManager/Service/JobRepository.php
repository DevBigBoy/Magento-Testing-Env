<?php
namespace Shezo\JobManager\Service;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Shezo\JobManager\Api\Data\JobInterface;
use Shezo\JobManager\Api\Data\JobSearchResultsInterfaceFactory;
use Shezo\JobManager\Api\JobRepositoryInterface;
use Shezo\JobManager\Model\JobFactory;
use Shezo\JobManager\Model\ResourceModel\Job as ResourceJob;
use Shezo\JobManager\Model\ResourceModel\Job\CollectionFactory;

class JobRepository implements JobRepositoryInterface
{
    /**
     * @var ResourceJob
     */
    private $resource;

    /**
     * @var JobFactory
     */
    private $jobFactory;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var JobSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @param ResourceJob $resource
     * @param JobFactory $jobFactory
     * @param CollectionFactory $collectionFactory
     * @param JobSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceJob $resource,
        JobFactory $jobFactory,
        CollectionFactory $collectionFactory,
        JobSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->jobFactory = $jobFactory;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(JobInterface $job)
    {
        try {
            $this->resource->save($job);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the job: %1', $exception->getMessage()),
                $exception
            );
        }
        return $job;
    }

    /**
     * @inheritDoc
     */
    public function getById($jobId)
    {
        $job = $this->jobFactory->create();
        $this->resource->load($job, $jobId);
        if (!$job->getId()) {
            throw new NoSuchEntityException(__('Job with id "%1" does not exist.', $jobId));
        }
        return $job;
    }

    /**
     * @inheritDoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(JobInterface $job)
    {
        try {
            $this->resource->delete($job);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the job: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($jobId)
    {
        return $this->delete($this->getById($jobId));
    }
}
