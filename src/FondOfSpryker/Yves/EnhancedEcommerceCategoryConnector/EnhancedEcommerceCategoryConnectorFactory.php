<?php

namespace FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector;

use FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\Dependency\EnhancedEcommerceCategoryConnectorToCurrencyClientInterface;
use FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\Expander\DataLayerExpander;
use FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\Expander\DataLayerExpanderInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class EnhancedEcommerceCategoryConnectorFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\Expander\DataLayerExpanderInterface
     */
    public function createDataLayerExpander(): DataLayerExpanderInterface
    {
        return new DataLayerExpander($this->getCurrencyClient());
    }

    /**
     * @return \FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\Dependency\EnhancedEcommerceCategoryConnectorToCurrencyClientInterface
     */
    public function getCurrencyClient(): EnhancedEcommerceCategoryConnectorToCurrencyClientInterface
    {
        return $this->getProvidedDependency(EnhancedEcommerceCategoryConnectorDependencyProvider::CLIENT_CURRENCY);
    }
}
