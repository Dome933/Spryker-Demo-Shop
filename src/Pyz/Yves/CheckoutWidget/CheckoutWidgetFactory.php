<?php

namespace Pyz\Yves\CheckoutWidget;

use SprykerShop\Yves\CheckoutWidget\CheckoutWidgetDependencyProvider;
use SprykerShop\Yves\CheckoutWidget\CheckoutWidgetFactory as SprykerCheckoutWidgetFactory;

class CheckoutWidgetFactory extends SprykerCheckoutWidgetFactory
{
    /**
     * @return \Pyz\Yves\CheckoutPage\Plugin\CheckoutBreadcrumbPlugin
     */
    public function getCheckoutBreadcrumbPlugin(): \Pyz\Yves\CheckoutPage\Plugin\CheckoutBreadcrumbPlugin
    {
        return $this->getProvidedDependency(CheckoutWidgetDependencyProvider::PLUGIN_CHECKOUT_BREADCRUMB);
    }
}
