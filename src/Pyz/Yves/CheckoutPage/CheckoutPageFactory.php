<?php

namespace Pyz\Yves\CheckoutPage;

use Pyz\Yves\CheckoutPage\Form\FormFactory;
use SprykerShop\Yves\CheckoutPage\CheckoutPageFactory as SprykerCheckoutPageFactory;
use Pyz\Yves\CheckoutPage\Process\StepFactory;

class CheckoutPageFactory extends SprykerCheckoutPageFactory
{
    /**
     * @return \Pyz\Yves\CheckoutPage\Process\StepFactory
     */
    public function createStepFactory(): StepFactory
    {
        return new StepFactory();
    }

    /**
     * @return FormFactory
     */
    public function createCheckoutFormFactory(): FormFactory
    {
        return new FormFactory();
    }
}
