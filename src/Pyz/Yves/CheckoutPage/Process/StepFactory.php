<?php

namespace Pyz\Yves\CheckoutPage\Process;

use Pyz\Yves\CheckoutPage\Process\Steps\OrderDetails\OrderDetailsStepExecutor;
use Pyz\Yves\CheckoutPage\Process\Steps\OrderDetails\PostConditionChecker;
use Pyz\Yves\CheckoutPage\Process\Steps\OrderDetailsStep;
use Pyz\Yves\CheckoutPage\Plugin\Router\CheckoutPageRouteProviderPlugin;
use SprykerShop\Yves\CheckoutPage\Plugin\Router\CheckoutPageRouteProviderPlugin as CheckoutPageRouteProviderPluginAlias;
use SprykerShop\Yves\CheckoutPage\Process\StepFactory as SprykerStepFactory;
use Pyz\Yves\CheckoutPage\Process\Steps\SummaryStep;

/**
 * @method \Pyz\Yves\CheckoutPage\CheckoutPageConfig getConfig()
 */
class StepFactory extends SprykerStepFactory
{

    /**
     * @return array|\Spryker\Yves\StepEngine\Dependency\Step\StepInterface[]
     */
    public function getSteps(): array
    {
        return [
            $this->createEntryStep(),
            $this->createCustomerStep(),
            $this->createAddressStep(),
            $this->createShipmentStep(),
            $this->createPaymentStep(),
            $this->createOrderDetailsStep(),
            $this->createSummaryStep(),
            $this->createPlaceOrderStep(),
            $this->createSuccessStep(),
            $this->createErrorStep(),
        ];
    }

    private function createOrderDetailsStep(): OrderDetailsStep
    {
        return new OrderDetailsStep(
            $this->createOrderDetailsStepExecutor(),
            $this->createOrderDetailsPostConditionChecker(),
            CheckoutPageRouteProviderPlugin::ROUTE_NAME_CHECKOUT_ORDER_DETAILS,
            $this->getConfig()->getEscapeRoute(),
        );
    }

    /**
     * @return SummaryStep
     */
    public function createSummaryStep(): SummaryStep
    {
        return new SummaryStep(
            $this->getProductBundleClient(),
            $this->getShipmentService(),
            $this->getConfig(),
            CheckoutPageRouteProviderPluginAlias::ROUTE_NAME_CHECKOUT_SUMMARY,
            $this->getConfig()->getEscapeRoute(),
            $this->getCheckoutClient(),
        );
    }

    /**
     * @return OrderDetailsStepExecutor
     */
    private function createOrderDetailsStepExecutor(): OrderDetailsStepExecutor
    {
        return new OrderDetailsStepExecutor();
    }

    /**
     * @return PostConditionChecker
     */
    private function createOrderDetailsPostConditionChecker(): PostConditionChecker
    {
        return new PostConditionChecker();
    }
}
