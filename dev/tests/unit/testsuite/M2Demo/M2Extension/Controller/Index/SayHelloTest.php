<?php
namespace M2Demo\M2Extension\Controller\Index;

class SayHelloTest extends \PHPUnit_Framework_TestCase
{
    public function testSayHelloAction()
    {
        $objectManager = new \Magento\TestFramework\Helper\ObjectManager($this);
        $context = $this->getMock('Magento\Framework\App\Action\Context', [], [], '', false);
        $view = $this->getMock('Magento\Framework\App\ViewInterface');
        $view->expects($this->once())
        ->method('loadLayout');
        $view->expects($this->once())
            ->method('renderLayout');
        $response = $this->getMock('Magento\Framework\App\ResponseInterface');
        $request = $this->getMock(
            'Magento\Framework\App\RequestInterface', [], [], '', false);
        $context->expects($this->any())->method('getRequest')->will($this->returnValue($request));
        $context->expects($this->any())->method('getResponse')->will($this->returnValue($response));
        $context->expects($this->any())->method('getView')->will($this->returnValue($view));
        $controller = $objectManager->getObject(
            'M2Demo\M2Extension\Controller\Index\SayHello',
            [
                'context' => $context,
                'moduleList' => $this->getMockForAbstractClass('Magento\Framework\Module\ModuleListInterface'),
            ]
        );
        $controller->execute();
    }
}
