<?php

namespace FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\Expander;

use FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\Dependency\EnhancedEcommerceCategoryConnectorToCurrencyClientInterface;

class DataLayerExpander implements DataLayerExpanderInterface
{
    /**
     * @var \FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\Dependency\EnhancedEcommerceCategoryConnectorToCurrencyClientInterface
     */
    protected $currencyClient;

    /**
     * @param \FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\Dependency\EnhancedEcommerceCategoryConnectorToCurrencyClientInterface $currencyClient
     */
    public function __construct(EnhancedEcommerceCategoryConnectorToCurrencyClientInterface $currencyClient)
    {
        $this->currencyClient = $currencyClient;
    }

    /**
     * @param string $page
     * @param array $twigVariableBag
     * @param array $dataLayer
     *
     * @return array
     */
    public function expand(string $page, array $twigVariableBag, array $dataLayer): array
    {
        // TODO: Implement expand() method.
    }
}
