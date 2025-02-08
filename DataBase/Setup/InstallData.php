<?php

namespace Shezo\DataBase\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        // Start setup process
        $setup->startSetup();

        // Define table name
        $tableName = $setup->getTable('shezo_affiliate_members');

        // Define multiple records
        $data = [
            [
                'name' => 'John Doe',
                'address' => '123 Magento Street, New York, NY',
                'status' => 1, // Active
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Jane Smith',
                'address' => '456 Commerce Ave, Los Angeles, CA',
                'status' => 1, // Active
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Alice Johnson',
                'address' => '789 E-commerce Blvd, Chicago, IL',
                'status' => 0, // Inactive
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Bob Williams',
                'address' => '321 Shopping Lane, Houston, TX',
                'status' => 1, // Active
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Charlie Brown',
                'address' => '654 Retail Rd, Miami, FL',
                'status' => 0, // Inactive
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        // Insert multiple records into the table
        $setup->getConnection()->insertMultiple($tableName, $data);

        // End setup process
        $setup->endSetup();
    }
}
