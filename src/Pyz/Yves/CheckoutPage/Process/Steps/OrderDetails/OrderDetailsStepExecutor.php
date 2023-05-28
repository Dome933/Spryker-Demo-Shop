<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\CheckoutPage\Process\Steps\OrderDetails;

use Generated\Shared\Transfer\QuoteTransfer;
use SprykerShop\Yves\CheckoutPage\Process\Steps\StepExecutorInterface;
use Symfony\Component\HttpFoundation\Request;

class OrderDetailsStepExecutor implements StepExecutorInterface
{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function execute(Request $request, QuoteTransfer $quoteTransfer): QuoteTransfer
    {
        return $quoteTransfer;
    }
}
