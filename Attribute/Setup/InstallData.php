<?php

namespace Shezo\Attribute\Setup;

use Magento\Catalog\Model\Product;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;
    public function __construct(
        EavSetupFactory $eavSetupFactory
    )
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            Product::ENTITY,
            'testing_eav_attribute',
            [
                'group' => 'Content',
                'type' => 'text',
                'backend' => \Shezo\Attribute\Model\Attribute\Backend\TestingEavAttribute::class,
                'input' => 'text',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => true,
                'user_defined' => true,
                'searchable' => false,
                'used_in_product_listing' => true,
                'label' => 'Testing EAV Attribute',
            ]
        );

        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            Product::ENTITY,
            'member_type',
            [
                'group' => 'Content',
                'type' => 'text',
                'input' => 'select',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'searchable' => false,
                'used_in_product_listing' => true,
                'label' => 'Member Type',
                'source' => \Shezo\Attribute\Model\Attribute\Source\MemberType::class, // ✅ Source for dropdown options

            ]
        );
        $setup->endSetup();
    }
}
