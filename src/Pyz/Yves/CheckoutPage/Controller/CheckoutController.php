<?php

namespace Pyz\Yves\CheckoutPage\Controller;

use Spryker\Yves\Kernel\View\View;
use SprykerShop\Yves\CheckoutPage\Controller\CheckoutController as SprykerCheckoutController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\CheckoutPage\CheckoutPageFactory getFactory()
 */
class CheckoutController extends SprykerCheckoutController
{

    /**
     * @param Request $request
     * @return RedirectResponse|View
     */
    public function orderDetailsAction(Request $request): RedirectResponse | View
    {
        $quoteValidationResponseTransfer = $this->canProceedCheckout();

        if (!$quoteValidationResponseTransfer->getIsSuccessful()) {
            $this->processErrorMessages($quoteValidationResponseTransfer->getMessages());

            return $this->redirectResponseInternal(static::ROUTE_CART);
        }

        $response = $this->createStepProcess()->process($request);

        if (!is_array($response)) {
            return $response;
        }

        return $this->view(
            $response,
            $this->getFactory()->getCustomerPageWidgetPlugins(),
            '@CheckoutPage/views/orderDetails/orderDetails.twig',
        );
    }
}
