<?php

namespace Shezo\FirstModel\Plugin;

use Magento\Catalog\Model\Product;

class PluginSolution
{
    /**
     * Add static text before setting the product name.
     *
     * @param Product $subject
     * @param string $name
     * @return array
     */
    public function beforeSetName(Product $subject, $name)
    {
        // Modify the name before it's set
        $name = 'before shezo ' . $name;
        return [$name]; // Always return an array for before plugins
    }

    /**
     * Add static text after retrieving the product name.
     *
     * @param Product $subject
     * @param string $result
     * @return string
     */
    public function afterGetName(Product $subject, $result)
    {
        // Modify the name after it's retrieved
        $result .= ' after shezo';
        return $result; // Return the modified result for after plugins
    }
}
