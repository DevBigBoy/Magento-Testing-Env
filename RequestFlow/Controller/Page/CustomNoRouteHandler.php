<?php

namespace Shezo\RequestFlow\Controller\Page;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Router\NoRouteHandlerInterface;

class CustomNoRouteHandler implements NoRouteHandlerInterface
{

    public function process(RequestInterface $request)
    {
        $request->setRouteName('noroutefound')->setControllerName('page')->setActionName('customnoroute');
        return true;
    }
}
