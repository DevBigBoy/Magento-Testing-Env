<?php

namespace Shezo\DataBase\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        // Check if we are upgrading to version 0.0.3
        if ($context->getVersion() && version_compare($context->getVersion(), '0.0.3', '<')) {
            // Define table name
            $tableName = $setup->getTable('shezo_affiliate_members');

            // Update all active members (status = 1) with a default phone number
            $setup->getConnection()->update(
                $tableName,
                ['phone_number' => '123-456-7890'], // New value
                'status = 1' // Condition
            );
        }

        $setup->endSetup();
    }
}
