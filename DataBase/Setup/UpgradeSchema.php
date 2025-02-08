<?php

namespace Shezo\DataBase\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        // Check if the installed version is less than 0.0.2
        if ($context->getVersion() && version_compare($context->getVersion(), '0.0.2', '<')) {
            // Add 'phone_number' column to 'shezo_affiliate_members' table
            $setup->getConnection()->addColumn(
                $setup->getTable('shezo_affiliate_members'),
                'phone_number',
                [
                    'type' => Table::TYPE_TEXT,
                    'length' => 15,
                    'nullable' => true,
                    'comment' => 'Phone Number'
                ]
            );
        }

        $setup->endSetup();
    }
}
