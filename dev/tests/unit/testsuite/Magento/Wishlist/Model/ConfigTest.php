<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Wishlist\Model;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\Wishlist\Model\Config
     */
    protected $model;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $_scopeConfig;

    /**
     * @var \Magento\Catalog\Model\Config|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $_catalogConfig;

    /**
     * @var \Magento\Catalog\Model\Attribute\Config|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $_attributeConfig;

    protected function setUp()
    {
        $this->_scopeConfig = $this->getMockBuilder('Magento\Framework\App\Config\ScopeConfigInterface')->getMock();
        $this->_catalogConfig = $this->getMockBuilder('Magento\Catalog\Model\Config')
            ->disableOriginalConstructor()
            ->getMock();
        $this->_attributeConfig = $this->getMockBuilder('Magento\Catalog\Model\Attribute\Config')
            ->disableOriginalConstructor()
            ->getMock();

        $this->model = new Config($this->_scopeConfig, $this->_catalogConfig, $this->_attributeConfig);
    }

    public function testGetProductAttributes()
    {
        $expectedResult = ['attribute_one', 'attribute_two', 'attribute_three'];

        $this->_catalogConfig->expects($this->once())
            ->method('getProductAttributes')
            ->willReturn(['attribute_one', 'attribute_two']);
        $this->_attributeConfig->expects($this->once())
            ->method('getAttributeNames')
            ->with('wishlist_item')
            ->willReturn(['attribute_three']);

        $this->assertEquals($expectedResult, $this->model->getProductAttributes());
    }

    public function testGetSharingEmailLimit()
    {
        $this->assertEquals(Config::SHARING_EMAIL_LIMIT, $this->model->getSharingEmailLimit());
    }

    public function testGetSharingTextLimit()
    {
        $this->assertEquals(Config::SHARING_TEXT_LIMIT, $this->model->getSharingTextLimit());
    }
}
