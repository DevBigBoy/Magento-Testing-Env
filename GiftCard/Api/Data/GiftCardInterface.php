<?php

namespace Shezo\GiftCard\Api\Data;

interface GiftCardInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param $id
     * @return void
     */
    public function setId($id);
    public function getCustomerId(): int;

    public function setCustomerId(int $customerId): void;
    public function getCode(): string;

    public function setCode(string $customerId): void;

    public function getStatus(): int;

    public function setStatus(int $customerId): void;

    public function getInitialValue(): float;

    public function setInitialValue(float $initialValue): void;
     public function getCurrentValue(): float;

    public function setCurrentValue(float $initialValue): void;

    public function getRecipientName(): string;

    public function setRecipientName(string $recipientName): void;
    public function getRecipientEmail(): string;
    public function setRecipientEmail(string $recipientName): void;
    public function getCreateAt(): \DateTime;
    public function setCreateAt(\DateTime $value): void;
    public function getUpdatedAt(): \DateTime;

    public function setUpdatedAt(\DateTime $value): void;
}
