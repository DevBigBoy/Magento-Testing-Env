<?php

namespace Shezo\NameYourPrice\Plugin;

use Magento\Quote\Model\Quote\Item;

class AddRentalToCartPlugin
{
    public function aroundSetCustomPrice(Item $subject, callable $proceed, $customPrice)
    {
        $request = $subject->getOptionByCode('info_buyRequest');
        if ($request) {
            $buyRequest = json_decode($request->getValue(), true);
            if (isset($buyRequest['rent_mode']) && $buyRequest['rent_mode'] == '1') {
                $subject->setCustomPrice($customPrice * 0.5); // Example: 50% discount for rentals
                $subject->setOriginalCustomPrice($customPrice * 0.5);
            }
        }

        return $proceed($customPrice);
    }
}
