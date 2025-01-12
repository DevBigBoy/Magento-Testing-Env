<?php
namespace Shezo\JobManager\Service;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Shezo\JobManager\Api\Data\DepartmentInterface;
use Shezo\JobManager\Api\Data\DepartmentSearchResultsInterfaceFactory;
use Shezo\JobManager\Api\DepartmentRepositoryInterface;
use Shezo\JobManager\Model\DepartmentFactory;
use Shezo\JobManager\Model\ResourceModel\Department as ResourceDepartment;
use Shezo\JobManager\Model\ResourceModel\Department\CollectionFactory;

class DepartmentRepository implements DepartmentRepositoryInterface
{
    /**
     * @var ResourceDepartment
     */
    private $resource;

    /**
     * @var DepartmentFactory
     */
    private $departmentFactory;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var DepartmentSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @param ResourceDepartment $resource
     * @param DepartmentFactory $departmentFactory
     * @param CollectionFactory $collectionFactory
     * @param DepartmentSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceDepartment $resource,
        DepartmentFactory $departmentFactory,
        CollectionFactory $collectionFactory,
        DepartmentSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->departmentFactory = $departmentFactory;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(DepartmentInterface $department)
    {
        try {
            $this->resource->save($department);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the department: %1', $exception->getMessage()),
                $exception
            );
        }
        return $department;
    }

    /**
     * @inheritDoc
     */
    public function getById($departmentId)
    {
        $department = $this->departmentFactory->create();
        $this->resource->load($department, $departmentId);
        if (!$department->getId()) {
            throw new NoSuchEntityException(__('Department with id "%1" does not exist.', $departmentId));
        }
        return $department;
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
    public function delete(DepartmentInterface $department)
    {
        try {
            $this->resource->delete($department);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the department: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($departmentId)
    {
        return $this->delete($this->getById($departmentId));
    }
}
