<?php

namespace Test\XmlFiles\Controller\Adminhtml\Index\Attribute;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Test\XmlFiles\Model\Catalog\CustomGroupConfig;
use Magento\Catalog\Model\Attribute\Config;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory ;
use Magento\Quote\Model\ResourceModel\Quote\Item\CollectionFactory as QuoteCollectionFactory ;
use Magento\Wishlist\Model\ResourceModel\Item\CollectionFactory as WishlistCollectionFactory ;

class Show extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \Test\XmlFiles\Model\Catalog\CustomGroupConfig
     */
    private $customGroupConfig;

    /**
     * @var \Magento\Catalog\Model\Attribute\Config
     */
    private $config;

    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $productCollectionFactory;

    /**
     * @var \Magento\Quote\Model\ResourceModel\Quote\Item\CollectionFactory
     */
    protected $quoteCollectionFactory;

    /**
     * @var \Magento\Wishlist\Model\ResourceModel\Item\CollectionFactory
     */
    protected $wishlistCollectionFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Test\XmlFiles\Model\Catalog\CustomGroupConfig $customGroupConfig
     * @param \Magento\Catalog\Model\Attribute\Config $config
     * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
     * @param \Magento\Quote\Model\ResourceModel\Quote\Item\CollectionFactory $quoteCollectionFactory
     * @param \Magento\Wishlist\Model\ResourceModel\Item\CollectionFactory $wishlistCollectionFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        CustomGroupConfig $customGroupConfig,
        Config $config,
        ProductCollectionFactory  $productCollectionFactory,
        QuoteCollectionFactory  $quoteCollectionFactory ,
        WishlistCollectionFactory  $wishlistCollectionFactory

    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->customGroupConfig = $customGroupConfig;
        $this->config = $config;
        $this->productCollectionFactory = $productCollectionFactory;
        $this->quoteCollectionFactory = $quoteCollectionFactory ;
        $this->wishlistCollectionFactory = $wishlistCollectionFactory ;
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Show Attributes'));
        $resultPage->addBreadcrumb(__('Attributes'), __('Attributes'));

        /** @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory */
        $productCollection = $this->productCollectionFactory->create();
        $productCollection->addIdFilter(
            [1,2,3]
        )->addAttributeToSelect(
            $this->customGroupConfig->getProductAttributes()
        )->setStoreId(1);

        var_dump($productCollection->toArray());

        echo '<br />';
        echo $productCollection->getSelect();
        echo '<br />';

        var_dump($productCollection->getData());

        /** @var \Magento\Quote\Model\ResourceModel\Quote\Item\CollectionFactory $quoteCollection */
        $quoteCollection = $this->quoteCollectionFactory->create();
        var_dump($quoteCollection->toArray());

        /** @var \Magento\Wishlist\Model\ResourceModel\Item\CollectionFactory $wishlistCollection */
        $wishlistCollection = $this->wishlistCollectionFactory->create();
        var_dump($wishlistCollection->toArray());

        echo '<br />';
        var_dump($this->config->getAttributeNames('quote_item'));

        echo '<br />';
        var_dump($this->config->getAttributeNames('wishlist_item'));

        echo '<br />';
        var_dump($this->config->getAttributeNames('custom_group_xmlfiles'));

        exit;

        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Test_XmlFiles::rule3');
    }
}
