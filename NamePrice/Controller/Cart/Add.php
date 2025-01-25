<?php

namespace Shezo\NameYourPrice\Controller\Cart;

use Magento\Checkout\Controller\Cart\Add as BaseAdd;

class Add extends BaseAdd
{
    public function execute()
    {
        $result = parent::execute();

        // Get request params to check if it's a rental
        $params = $this->getRequest()->getParams();

        if (isset($params['rent_mode']) && $params['rent_mode'] == '1') {
            $this->messageManager->addSuccessMessage(__('Product added to cart as a rental.'));
        }

        return $result;
    }
}
