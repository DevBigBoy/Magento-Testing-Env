<?php

namespace Shezo\CancelOrder\Model;

use Magento\Framework\Model\AbstractModel;
use Shezo\CancelOrder\Api\Data\CancelOrderRequestInterface;

class CancelOrderRequest extends AbstractModel implements CancelOrderRequestInterface
{
    protected function _construct()
    {
        $this->_init(\Shezo\CancelOrder\Model\ResourceModel\CancelOrderRequest::class);
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function getOrderId()
    {
        return $this->getData(self::ORDER_ID);
    }

    public function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    public function getCustomerComment()
    {
        return $this->getData(self::CUSTOMER_COMMENT);
    }

    public function getCustomerEmail()
    {
        return $this->getData(self::CUSTOMER_EMAIL);
    }

    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    public function setOrderId($orderId)
    {
        return $this->setData(self::ORDER_ID, $orderId);
    }

    public function setCustomerId($customerId)
    {
        return $this->setData(self::CUSTOMER_ID, $customerId);
    }

    public function setCustomerComment($customerComment)
    {
        return $this->setData(self::CUSTOMER_COMMENT, $customerComment);
    }

    public function setCustomerEmail($customerEmail)
    {
        return $this->setData(self::CUSTOMER_EMAIL, $customerEmail);
    }

    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}
