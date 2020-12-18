<?php

namespace FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector;

use FondOfSpryker\Yves\EnhancedEcommerceCategoryConnector\Dependency\EnhancedEcommerceCategoryConnectorToCurrencyClientBridge;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;
use Spryker\Yves\Money\Plugin\MoneyPlugin;

class EnhancedEcommerceCategoryConnectorDependencyProvider extends AbstractBundleDependencyProvider
{
    public const CLIENT_CURRENCY = 'CLIENT_CURRENCY';
    public const PLUGIN_MONEY = 'PLUGIN_MONEY';

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = $this->addCurrencyClient($container);
        $container = $this->addMoneyPlugin($container);

        return $container;
    }

    /**
     * @param \Spryker\Glue\Kernel\Container $container
     *
     * @return \Spryker\Glue\Kernel\Container
     */
    protected function addCurrencyClient(Container $container): Container
    {
        $container->set(static::CLIENT_CURRENCY, function (Container $container) {
            return new EnhancedEcommerceCategoryConnectorToCurrencyClientBridge(
                $container->getLocator()->currency()->client()
            );
        });

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addMoneyPlugin(Container $container): Container
    {
        $container->set(static::PLUGIN_MONEY, static function () {
            return new MoneyPlugin();
        });

        return $container;
    }
}
