<?php

namespace Pyz\Yves\CheckoutPage\Process\Steps;

use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use SprykerShop\Yves\CheckoutPage\Process\Steps\SummaryStep as SprykerSummaryStep;

class SummaryStep extends SprykerSummaryStep
{
    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(AbstractTransfer $quoteTransfer)
    {
        return $quoteTransfer->getBillingAddress() !== null
            && $this->haveItemsShipmentTransfers($quoteTransfer)
            && $quoteTransfer->getPayment() !== null
            && $quoteTransfer->getPayment()->getPaymentProvider() !== null
            && $quoteTransfer->getOrderName() !== null;
    }
}
