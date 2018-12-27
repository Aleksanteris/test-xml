<?php

namespace Test\XmlFiles\Controller\Routing\Forward;

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

    public function execute()
    {
        $parameters = ['param1' => 'value1', 'param2' => 'value2'];
        $this->_forward('showmessage', 'routing_forward', 'routingtest', $parameters);
        // $this->_forward('showmessage', '', '', $parameters);
        // $this->_forward('getbyId', 'flat_repository', 'blog');

        /** @var \Magento\Framework\Controller\Result\Forward $resultForward */
/*        $resultForward = $this->resultFactory->create(ResultFactory::TYPE_FORWARD);
        $resultForward->forward('showmessage');
        return $resultForward;*/
    }
}
