<?php
namespace Shezo\JobManager\Api\Data;

interface DepartmentSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get departments list.
     *
     * @return \Shezo\JobManager\Api\Data\DepartmentInterface[]
     */
    public function getItems();

    /**
     * Set departments list.
     *
     * @param \Shezo\JobManager\Api\Data\DepartmentInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
