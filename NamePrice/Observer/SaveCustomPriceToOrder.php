<?php

namespace Shezo\NamePrice\Observer;

use Magento\Framework\Event\ObserverInterface;

class SaveCustomPriceToOrder implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        foreach ($order->getAllItems() as $item) {
            $quoteItem = $item->getQuoteItem();
            if ($quoteItem) {
                $customPrice = $quoteItem->getCustomPrice();
                if ($customPrice) {
                    $item->setOriginalPrice($customPrice);
                    $item->setBaseOriginalPrice($customPrice);
                }
            }
        }
    }
}
