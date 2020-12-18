<?php

namespace FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\Plugin\DataLayer;

use FondOfSpryker\Shared\EnhancedEcommerceCategoryConnector\EnhancedEcommerceCategoryConnectorConstants as ModuleConstants;
use FondOfSpryker\Yves\EnhancedEcommerceExtension\Dependency\EnhancedEcommerceDataLayerExpanderPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * Class ProductImpressionsExpanderPlugin
 *
 * @package FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\Plugin
 * @method \FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\EnhancedEcommerceCategoryConnectorFactory getFactory()
 */
class ProductImpressionsExpanderPlugin extends AbstractPlugin implements EnhancedEcommerceDataLayerExpanderPluginInterface
{
    /**
     * @param string $pageType
     * @param array $twigVariableBag
     *
     * @return bool
     */
    public function isApplicable(string $pageType, array $twigVariableBag = []): bool
    {
        return isset($twigVariableBag[ModuleConstants::PARAM_PRODUCTS])
            && count($twigVariableBag[ModuleConstants::PARAM_PRODUCTS]) > 0;
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
        return $this->getFactory()
            ->createDataLayerExpander()
            ->expand($page, $twigVariableBag, $dataLayer);
    }
}
