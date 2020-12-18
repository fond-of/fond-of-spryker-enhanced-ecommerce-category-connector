<?php

namespace FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\Plugin\DataLayer;

use Codeception\Test\Unit;
use FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\EnhancedEcommerceCategoryConnectorFactory;
use FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\Expander\DataLayerExpanderInterface;

class ProductImpressionsExpanderPluginTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\EnhancedEcommerceCategoryConnectorFactory
     */
    protected $factoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\Expander\DataLayerExpanderInterface
     */
    protected $expanderMock;

    /**
     * @var \FondOfSpryker\Yves\EnhancedEcommerceExtension\Dependency\EnhancedEcommerceDataLayerExpanderPluginInterface
     */
    protected $plugin;

    /**
     * @var array
     */
    protected $twigVariableBag;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->factoryMock = $this->getMockBuilder(EnhancedEcommerceCategoryConnectorFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->expanderMock = $this->getMockBuilder(DataLayerExpanderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->twigVariableBag = include codecept_data_dir('twigVariableBag.php');

        $this->plugin = new ProductImpressionsExpanderPlugin();
        $this->plugin->setFactory($this->factoryMock);
    }

    /**
     * @return void
     */
    public function testIsApplicable(): void
    {
        $this->assertEquals(true, $this->plugin->isApplicable('pageType', $this->twigVariableBag));
    }

    /**
     * @return void
     */
    public function testExpand(): void
    {
        $this->factoryMock->expects($this->atLeastOnce())
            ->method('createDataLayerExpander')
            ->willReturn($this->expanderMock);

        $this->expanderMock->expects($this->atLeastOnce())
            ->method('expand');

        $this->plugin->expand('pageType', $this->twigVariableBag, []);
    }
}
