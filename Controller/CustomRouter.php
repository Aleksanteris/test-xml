<?php

namespace Test\XmlFiles\Controller;

use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ResponseInterface;

class CustomRouter implements \Magento\Framework\App\RouterInterface
{
    /**
     * @var \Magento\Framework\App\ActionFactory
     */
    protected $actionFactory;

    /**
     * @var \Magento\Framework\App\ResponseInterface
     */
    protected $_response;

    /**
     * @param \Magento\Framework\App\ActionFactory $actionFactory
     * @param \Magento\Framework\App\ResponseInterface $response
     */
    public function __construct(
        ActionFactory $actionFactory,
        ResponseInterface $response
    ) {
        $this->actionFactory = $actionFactory;
        $this->_response = $response;
    }

    /**
     * Validate,Match and modify request
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return \Magento\Framework\App\ActionInterface|null
     */
    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        /*
         * We will search “customrout” and “second” words and make forward depend on word
         */
        $identifier = trim($request->getPathInfo(), '/');

        if (strpos($identifier, 'customrout') !== false) {
            $request->setModuleName('customrout');
            $request->setControllerName('routing_router');
            $request->setActionName('actionone');
            $request->setParams(['param1' =>'Value1', 'param2' => 'Value2']);
        } else if (strpos($identifier, 'second') !== false) {
            $request->setModuleName('second');
            $request->setControllerName('routing_router');
            $request->setActionName('actiontwo');
            $request->setParams(['param1' =>'Value1', 'param2' => 'Value2']);
        } else {
            //There is no match
            return null;
        }

        /*
         * We have match and now we will forward action
         */
        return $this->actionFactory->create(\Magento\Framework\App\Action\Forward::class);
    }
}
