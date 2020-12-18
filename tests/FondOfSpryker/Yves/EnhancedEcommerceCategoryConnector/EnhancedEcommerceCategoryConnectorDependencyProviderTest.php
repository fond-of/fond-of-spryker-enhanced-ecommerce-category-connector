<?php

namespace FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector;

use Codeception\Test\Unit;
use Spryker\Yves\Kernel\Container;

class EnhancedEcommerceCategoryConnectorDependencyProviderTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Yves\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \FondOfSpryker\Yves\GoogleTagManagerQuoteConnector\GoogleTagManagerQuoteConnectorDependencyProvider
     */
    protected $dependencyProvider;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->dependencyProvider = new EnhancedEcommerceCategoryConnectorDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->dependencyProvider->provideDependencies(
                $this->containerMock
            )
        );
    }
}
