<?php

namespace Test\XmlFiles\Controller\Routing\Router;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class ActionTwo extends \Magento\Framework\App\Action\Action
{
    /**
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $value1 = $this->getRequest()->getParam('param1');
        $value2 = $this->getRequest()->getParam('param2');

        echo 'Message for Custom Router (ActionTwo)  / ' . 'Value param1 is ' . $value1 . ' / ' . 'Value param2 is ' . $value2;
        // Message for Custom Router (ActionTwo) / Value param1 is Value1 / Value param2 is Value2
        // Status Code: 200 OK; Request Method: GET
        // Request URL: http://magento2.docker/second

        exit();
        return $resultPage;
    }
}
