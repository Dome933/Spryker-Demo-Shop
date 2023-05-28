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
        return true;
    }
}
