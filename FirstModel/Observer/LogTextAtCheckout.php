<?php

namespace Shezo\FirstModel\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class LogTextAtCheckout implements ObserverInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Constructor with Dependency Injection
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Execute method triggered by the event
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        // Log a custom message
        $this->logger->info('Your text Hello After checkout');

        // If needed, you can retrieve data from the observer
        $event = $observer->getEvent();
        // Example: Getting an order object from the event
        $order = $event->getOrder(); // Depends on the event being observed

        if ($order) {
            $this->logger->info('Order ID: ' . $order->getId());
        }
    }
}
