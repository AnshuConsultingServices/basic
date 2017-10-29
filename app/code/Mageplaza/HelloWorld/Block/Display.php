<?php
namespace Mageplaza\HelloWorld\Block;

use Magento\Framework\Data\Form\Element\Select;
class Display extends \Magento\Framework\View\Element\Template
{
	//protected $_select;
	protected $_objectManager;

	public function __construct(\Magento\Framework\View\Element\Template\Context $context, \Magento\Framework\ObjectManagerInterface $objectManager)
	{
		//$this->_select = $_select;
		//$this->_objectManager = $objectManager;
		parent::__construct($context);
		$this->_objectManager = $objectManager;
	}

	public function sayHello()
	{
		

return __('Hello World');
	}

	public function displayselect(){

		$animals = array(
  array(
    'value' => 'cat',
    'label' => 'Cat',
  ),
  array(
    'value' => 'dog',
    'label' => 'Dog',
  ),
  array(
   'value' => 'X',
   'label' => 'mother-in-law'
  ),
);

		//$layout = $this->_objectManager->get('Magento\Framework\View\LayoutInterface');
		//$select = $this->getLayout()->createBlock('Magento\Framework\Data\Form\Element\Select');
		//$select->setOptions($animals);
		//$select->setName('animals')->setClass('animals-select')->setId('animals-select');
return __('sell');
	}
}