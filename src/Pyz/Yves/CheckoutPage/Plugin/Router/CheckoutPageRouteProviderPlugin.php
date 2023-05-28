<?php

namespace Pyz\Yves\CheckoutPage\Plugin\Router;

use Spryker\Yves\Router\Route\RouteCollection;
use SprykerShop\Yves\CheckoutPage\Plugin\Router\CheckoutPageRouteProviderPlugin as SprykerCheckoutPageRouteProviderPlugin;

class CheckoutPageRouteProviderPlugin extends SprykerCheckoutPageRouteProviderPlugin
{

    public const ROUTE_NAME_CHECKOUT_ORDER_DETAILS= 'checkout-order-details';
    public const ROUTE_CHECKOUT_ORDER_DETAILS = '/checkout/order-details';


    /**
     * Specification:
     * - Adds Routes to the RouteCollection.
     *
     * @api
     *
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     */
    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $routeCollection = parent::addRoutes($routeCollection);
        $routeCollection = $this->addOrderDetailsRoute($routeCollection);


        return $routeCollection;
    }
    /**
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     */
    protected function addOrderDetailsRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute(
            static::ROUTE_CHECKOUT_ORDER_DETAILS,
            'CheckoutPage',
            'Checkout',
            'orderDetailsAction');
        $route = $route->setMethods(['GET', 'POST']);
        $routeCollection->add(static::ROUTE_NAME_CHECKOUT_ORDER_DETAILS, $route);

        return $routeCollection;
    }
}
