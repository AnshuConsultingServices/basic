<?php
namespace Mageplaza\HelloWorld\Controller\Index;

class Display extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
                $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // instance of object manager
$product = $objectManager->create('\Magento\Catalog\Model\Product');
$product->setSku('my-skuw'); // Set your sku here
$product->setName('Sample Simple Producst'); // Name of Product
$product->setAttributeSetId(9); // Attribute set id
$product->setStatus(1); // Status on product enabled/ disabled 1/0
$product->setWeight(10); // weight of product
$product->setVisibility(4); // visibilty of product (catalog / search / catalog, search / Not visible individually)
$product->setTaxClassId(0); // Tax class id
$product->setTypeId('simple'); // type of product (simple/virtual/downloadable/configurable)
$product->setPrice(100); // price of product
//$product->setAttribute('author_name','test');
//$product->setAttribute('test','author_name');

$attrCode = 'author_name';
$valueText = ('PATAGONIA');
//$valueId = $product->getResource()->getAttribute($attrCode)->getSource()->getOptionId($valueText);
//$product->setData($attrCode, $valueText);
$product->setData('author_name','foobar');


//$product->getResource()->saveAttribute($product,'author_name');
$product->setStockData(
                        array(
                            'use_config_manage_stock' => 0,
                            'manage_stock' => 1,
                            'is_in_stock' => 1,
                            'qty' => 999999999
                        )
                    );
//$this->_log("am here");
//\Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->debug( $product->getAttributes())
;
//echo $product->getCustomAttributesCodes();
$product->save();
        return $this->_pageFactory->create();
return;
    }
}