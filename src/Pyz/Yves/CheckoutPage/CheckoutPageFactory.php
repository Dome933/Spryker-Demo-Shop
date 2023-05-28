<?php

namespace Pyz\Yves\CheckoutPage;

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
}
