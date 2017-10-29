<?php
namespace Mageplaza\HelloWorld\Controller\Index;

use Magento\Framework\App\Filesystem\DirectoryList;

class Display extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_filesystem;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Filesystem $fileSystem)
    {
        $this->_pageFactory = $pageFactory;
        $this->_filesystem = $fileSystem;
        return parent::__construct($context);
    }

    public function execute()
    {
                    $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // instance of object manager

                $post = $this->getRequest()->getPost();
                $myimage;

        if ($post) {
            // Retrieve your form data
            $bookname   = $post['bookname'];
            $author    = $post['author'];
            \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->debug( '1');
            //if ($_FILES['']) {

if (isset($_FILES['front-cover'])) {

\Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->debug( '2');
            /** @var \Magento\Catalog\Model\Product\Media\Config $config */
            $config = $objectManager->get('Magento\Catalog\Model\Product\Media\Config');
            /** @var \Magento\Framework\Filesystem\Directory\WriteInterface $mediaDirectory */
            $mediaDirectory = $objectManager->get('Magento\Framework\Filesystem')
                ->getDirectoryWrite(DirectoryList::MEDIA);
\Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->debug( '3');
            $baseMediaPath = $config->getBaseMediaPath();
            //$mediaDirectory->create($baseTmpMediaPath);
            //copy(__DIR__ . '/product_image.png', $mediaDirectory->getAbsolutePath($baseTmpMediaPath . '/product_image.png'));

            \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->debug( $baseMediaPath);
//\Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->debug( $mediaDirectory);
        
 // init uploader model.
                $uploader = $this->_objectManager->create(
                    'Magento\MediaStorage\Model\File\Uploader',
                    ['fileId' => 'front-cover']
                );
                $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                $uploader->setAllowRenameFiles(true);
                $uploader->setFilesDispersion(true);

                $myimage = $uploader->save($mediaDirectory->getAbsolutePath($baseMediaPath));


            




            $product = $objectManager->create('\Magento\Catalog\Model\Product');

            $product->setSku($bookname); // Set your sku here
            $product->setName($bookname); // Name of Product
            $product->setAttributeSetId(9); // Attribute set id
            $product->setStatus(1); // Status on product enabled/ disabled 1/0
            //$product->setWeight(10); // weight of product
            $product->setVisibility(4); // visibilty of product (catalog / search / catalog, search / Not visible individually)
            $product->setTaxClassId(0); // Tax class id
            $product->setTypeId('simple'); // type of product (simple/virtual/downloadable/configurable)
            $product->setPrice(100); // price of product

            $product->setData('author_name',$author);

$categories = array(8,2);
$product->setCategoryIds($categories);
            //$product->getResource()->saveAttribute($product,'author_name');
            $product->setStockData(
                                    array(
                                        'use_config_manage_stock' => 0,
                                        'manage_stock' => 1,
                                        'is_in_stock' => 1,
                                        'qty' => 1
                                    )
                                );
            $myfilepath = $myimage['file'];
            \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->debug($mediaDirectory->getAbsolutePath($baseMediaPath).$myfilepath ); 

            $product->addImageToMediaGallery($mediaDirectory->getAbsolutePath($baseMediaPath).$myfilepath, array('image', 'small_image', 'thumbnail'), false, false); // Add Image 3
//$this->_log("am here");

//echo $product->getCustomAttributesCodes();
$product->save();
}
}
        return $this->_pageFactory->create();
return;
    }
}