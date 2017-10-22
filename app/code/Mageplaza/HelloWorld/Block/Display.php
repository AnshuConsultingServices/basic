<?php
namespace Mageplaza\HelloWorld\Block;
class Display extends \Magento\Framework\View\Element\Template
{
	public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	{
		parent::__construct($context);
	}

	public function sayHello()
	{
		
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // instance of object manager
$product = $objectManager->create('\Magento\Catalog\Model\Product');
$product->setSku('my-sku'); // Set your sku here
$product->setName('Sample Simple Product'); // Name of Product
$product->setAttributeSetId(4); // Attribute set id
$product->setStatus(1); // Status on product enabled/ disabled 1/0
$product->setWeight(10); // weight of product
$product->setVisibility(4); // visibilty of product (catalog / search / catalog, search / Not visible individually)
$product->setTaxClassId(0); // Tax class id
$product->setTypeId('simple'); // type of product (simple/virtual/downloadable/configurable)
$product->setPrice(100); // price of product
$product->setStockData(
                        array(
                            'use_config_manage_stock' => 0,
                            'manage_stock' => 1,
                            'is_in_stock' => 1,
                            'qty' => 999999999
                        )
                    );
$product->save();
return __('Hello World');
	}
}