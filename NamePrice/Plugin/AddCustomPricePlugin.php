<?php

namespace Shezo\NamePrice\Plugin;

use Magento\Quote\Model\Quote\Item;

class AddCustomPricePlugin
{
    public function aroundSetCustomPrice(Item $subject, callable $proceed, $customPrice)
    {
        $request = $subject->getOptionByCode('info_buyRequest');
        if ($request) {
            $buyRequest = json_decode($request->getValue(), true);
            if (isset($buyRequest['name_your_price']) && $buyRequest['name_your_price'] > 0) {
                $customPrice = $buyRequest['name_your_price'];
                $subject->setCustomPrice($customPrice);
                $subject->setOriginalCustomPrice($customPrice);
            }
        }
        return $proceed($customPrice);
    }
}
