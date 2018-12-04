<?php

namespace Test\XmlFiles\Model\Catalog;

class CustomGroupConfig
{
    /**
     * @var \Magento\Catalog\Model\Attribute\Config
     */
    private $attributeConfig;

    /**
     * @param \Magento\Catalog\Model\Attribute\Config $attributeConfig
     */
    public function __construct(\Magento\Catalog\Model\Attribute\Config $attributeConfig)
    {
        $this->attributeConfig = $attributeConfig;
    }

    /**
     * @return array
     */
    public function getProductAttributes() {
        return $this->attributeConfig->getAttributeNames('custom_group_xmlfiles');
    }
}
