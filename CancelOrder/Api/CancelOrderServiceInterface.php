<?php

namespace Shezo\CancelOrder\Api;

use Magento\Sales\Api\Data\OrderInterface;
use Magento\Framework\Exception\LocalizedException;

interface CancelOrderServiceInterface
{
    /**
     * Cancel an order by its ID.
     *
     * @param int $orderId
     * @param string|null $comment
     * @return bool
     * @throws LocalizedException
     */
    public function execute(int $orderId, ?string $comment = null): bool;
}
