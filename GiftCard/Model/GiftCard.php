<?php

namespace Shezo\GiftCard\Model;

use Magento\Framework\Model\AbstractModel;
use Shezo\GiftCard\Api\Data\GiftCardInterface;
use Shezo\GiftCard\Model\ResourceModel\GiftCard as GiftCardResourceModel;

class GiftCard extends AbstractModel implements GiftCardInterface
{
    protected function _construct()
    {
        $this->_init(GiftCardResourceModel::class);
    }

    public function getCustomerId(): int
    {
        return (int) $this->getData('assigned_customer_id');
    }

    public function setCustomerId(int $customerId): void
    {
        $this->setData('assigned_customer_id', $customerId);
    }

    public function getCode(): string
    {
        return (string) $this->getData('code');
    }

    public function setCode(string $customerId): void
    {
        $this->setData('code', $customerId);
    }

    public function getStatus(): int
    {
        return (int) $this->getData('status');
    }

    public function setStatus(int $customerId): void
    {
        $this->setData('status', $customerId);
    }

    public function getInitialValue(): float
    {
        return (float) $this->getData('initial_value');
    }

    public function setInitialValue(float $initialValue): void
    {
         $this->setData('initial_value', $initialValue);
    } public function getCurrentValue(): float
    {
        return (float) $this->getData('current_value');
    }

    public function setCurrentValue(float $initialValue): void
    {
         $this->setData('current_value', $initialValue);
    }

    public function getRecipientName(): string
    {
        return (string) $this->getData('recipient_name');
    }

    public function setRecipientName(string $recipientName): void
    {
        $this->setData('recipient_name', $recipientName);
    }
    public function getRecipientEmail(): string
    {
        return (string) $this->getData('recipient_email');
    }

    public function setRecipientEmail(string $recipientName): void
    {
        $this->setData('recipient_email', $recipientName);
    }
    public function getCreateAt(): \DateTime
    {
        return new \DateTime($this->getData('created_at'));
    }

    public function setCreateAt(\DateTime $value): void
    {
        $this->setData('created_at', $value->format('Y-m-d H:i:s'));
    }
    public function getUpdatedAt(): \DateTime
    {
        return new \DateTime($this->getData('updated_at'));
    }

    public function setUpdatedAt(\DateTime $value): void
    {
        $this->setData('updated_at', $value->format('Y-m-d H:i:s'));
    }
}
