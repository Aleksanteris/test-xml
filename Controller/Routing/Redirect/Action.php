<?php

namespace Test\XmlFiles\Controller\Routing\Redirect;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Action extends \Magento\Framework\App\Action\Action
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
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $parameters = ['param1' => 'value1', 'param2' => 'value2'];

        /** @var \Magento\Framework\Controller\Result\Redirect $resultRedirect */
        $resultRedirect = $this->_redirect('routingtest/routing_redirect/showmessage', $parameters);
        // $resultRedirect = $this->_redirect('*/*/showmessage', $parameters);
        // $resultRedirect = $this->_redirect('blog/flat_repository/getbyId');

       /** @var \Magento\Framework\Controller\Result\Forward $resultForward */
       // $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
       // $resultRedirect->setPath('*/*/showmessage', ['param1' => 'valueA', 'param2' => 'valueB'] );
       // $resultRedirect->setUrl('https://github.com');

        return $resultRedirect;
    }
}
