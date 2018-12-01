<?php

namespace Test\XmlFiles\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Test\XmlFiles\Model\Cache\Type\CustomCache;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \Test\XmlFiles\Model\Cache\Type\CustomCache
     */
    protected $cache;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Test\XmlFiles\Model\Cache\Type\CustomCache
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        CustomCache $cache,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->cache = $cache;
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Menu Test Xml Files'));
        $resultPage->addBreadcrumb(__('Test Xml'), __('Test Xml'));

        // Test cache
        $cacheId = 'some-specific-id-cache';
        $objInfo = null;
        $_objInfo = $this->cache->load($cacheId);

        if ($_objInfo) {
            $objInfo = unserialize($_objInfo);
        } else {
            $objInfo = [
                'var1' => 'val1',
                'var2' => 'val2',
                'var3' => 'val3',
            ];
            $this->cache->save(serialize($objInfo),	$cacheId);
        }

        $cacheId2 = 'specific-id-cache-two';
        $objInfo2 = null;
        $_objInfo2 = $this->cache->load($cacheId2);

        if ($_objInfo2) {
            $objInfo2 = unserialize($_objInfo2);
        } else {
            $objInfo2 = [
                'varTwo1' => 'valTwo1',
                'varTwo2' => 'valTwo2',
                'varTwo3' => 'valTwo3',
            ];
            $this->cache->save(serialize($objInfo2), $cacheId2);
        }

        var_dump($objInfo);
        echo '<br/>';
        var_dump($objInfo2);

        exit;

        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Test_XmlFiles::rule3');
    }
}
