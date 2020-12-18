<?php

namespace FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\Dependency;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\CurrencyTransfer;
use Spryker\Client\Currency\CurrencyClientInterface;

class EnhancedEcommerceCategoryConnectorToCurrencyClientBridgeTest extends Unit
{
    /**
     * @return void
     */
    public function getCurrent(): void
    {
        $currencyClientMock = $this->getMockBuilder(CurrencyClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $currencyTransferMock = $this->getMockBuilder(CurrencyTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $currencyClientMock->expects($this->atLeastOnce())
            ->method('getCurrent')
            ->willReturn($currencyTransferMock);

        $bridge = new EnhancedEcommerceCategoryConnectorToCurrencyClientBridge($currencyClientMock);
        $bridge->getCurrent();
    }
}
