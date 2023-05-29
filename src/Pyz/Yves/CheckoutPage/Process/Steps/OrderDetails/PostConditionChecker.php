<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\CheckoutPage\Process\Steps\OrderDetails;

use Generated\Shared\Transfer\QuoteTransfer;
use SprykerShop\Yves\CheckoutPage\Process\Steps\PostConditionCheckerInterface;

class PostConditionChecker implements PostConditionCheckerInterface
{
    /**
     * @param QuoteTransfer $quoteTransfer
     * @return bool
     */
    public function check(QuoteTransfer $quoteTransfer): bool
    {
        return $quoteTransfer->getBillingAddress() !== null
            && $this->haveItemsShipmentTransfers($quoteTransfer)
            && $quoteTransfer->getPayment() !== null
            && $quoteTransfer->getPayment()->getPaymentProvider() !== null;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    protected function haveItemsShipmentTransfers(QuoteTransfer $quoteTransfer): bool
    {
        foreach ($quoteTransfer->getItems() as $itemTransfer) {
            if ($itemTransfer->getShipment() === null) {
                return false;
            }
        }

        return true;
    }
}
