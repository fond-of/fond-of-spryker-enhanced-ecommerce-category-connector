<?php

namespace FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\Dependency;

use Generated\Shared\Transfer\CurrencyTransfer;

interface EnhancedEcommerceCategoryConnectorToCurrencyClientInterface
{
    /**
     * @return \Generated\Shared\Transfer\CurrencyTransfer
     */
    public function getCurrent(): CurrencyTransfer;
}
