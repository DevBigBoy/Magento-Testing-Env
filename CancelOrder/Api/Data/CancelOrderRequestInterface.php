<?php

namespace Shezo\CancelOrder\Api\Data;

interface CancelOrderRequestInterface
{
    const ID = 'id';
    const ORDER_ID = 'order_id';
    const CUSTOMER_ID = 'customer_id';
    const CUSTOMER_COMMENT = 'customer_comment';
    const CUSTOMER_EMAIL = 'customer_email';
    const STATUS = 'status';
    const CREATED_AT = 'created_at';

    public function getId();
    public function getOrderId();
    public function getCustomerId();
    public function getCustomerComment();
    public function getCustomerEmail();
    public function getStatus();
    public function getCreatedAt();

    public function setId($id);
    public function setOrderId($orderId);
    public function setCustomerId($customerId);
    public function setCustomerComment($customerComment);
    public function setCustomerEmail($customerEmail);
    public function setStatus($status);
    public function setCreatedAt($createdAt);
}
