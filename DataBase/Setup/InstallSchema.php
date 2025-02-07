<?php

namespace Shezo\DataBase\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        // Start setup process
        $setup->startSetup();

        // Define table name with prefix support
        $tableName = $setup->getTable('shezo_affiliate_members');

        // Check if table already exists to prevent duplicate creation
        if (!$setup->getConnection()->isTableExists($tableName)) {
            $table = $setup->getConnection()->newTable($tableName)
                // Primary Key (Auto Increment)
                ->addColumn(
                    'entity_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                    'Entity ID'
                )
                // Member Name
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Member Name'
                )
                // Member Address
                ->addColumn(
                    'address',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Member Address'
                )
                // Status Column (0 = Inactive, 1 = Active)
                ->addColumn(
                    'status',
                    Table::TYPE_SMALLINT, // Better for storing tiny values (0/1)
                    null,
                    ['nullable' => false, 'default' => 0, 'unsigned' => true],
                    'Status (0 = Inactive, 1 = Active)'
                )
                // Created At (Auto-set on creation)
                ->addColumn(
                    'created_at',
                    Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                    'Creation Timestamp'
                )
                // Updated At (Auto-update on modification)
                ->addColumn(
                    'updated_at',
                    Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
                    'Update Timestamp'
                )
                // Set table options
                ->setComment('Affiliate Members Table');

            // Execute table creation
            $setup->getConnection()->createTable($table);
        }

        // End setup process
        $setup->endSetup();
    }
}
