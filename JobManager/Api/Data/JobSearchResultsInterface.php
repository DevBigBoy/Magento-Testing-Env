<?php

namespace Shezo\JobManager\Api\Data;
interface JobSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get jobs list.
     *
     * @return \Shezo\JobManager\Api\Data\JobInterface[]
     */
    public function getItems();

    /**
     * Set jobs list.
     *
     * @param \Shezo\JobManager\Api\Data\JobInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
