<?php

namespace Test\XmlFiles\Controller\Routing\Forward;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class ShowMessage extends \Magento\Framework\App\Action\Action
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

        echo 'Message for Forward / ' . 'Value param1 is ' . $value1 . ' / ' . 'Value param2 is ' . $value2;
        // Message for Forward / Value param1 is value1 / Value param2 is value2
        // Status Code: 200 OK; Request Method: GET
        // Request URL: http://magento2.docker/routingtest/routing_forward/action

        exit();
        return $resultPage;
    }
}
