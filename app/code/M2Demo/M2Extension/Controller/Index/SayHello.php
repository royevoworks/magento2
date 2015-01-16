<?php
namespace M2Demo\M2Extension\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Module\ModuleListInterface;

/**
 * Barebones Magento extension controller
 */
class SayHello extends \Magento\Framework\App\Action\Action
{
    /**
     * @var ModuleListInterface
     */
    private $moduleList;

    /**
     * @param Context $context
     * @param ModuleListInterface $moduleList
     */
    public function __construct(
        Context $context,
        ModuleListInterface $moduleList
    ) {
        parent::__construct($context);
        $this->moduleList = $moduleList;
    }

    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}