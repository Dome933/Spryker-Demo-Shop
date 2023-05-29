<?php

namespace Pyz\Zed\Sales\Business\OrderWriter;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\SpySalesOrderEntityTransfer;
use Spryker\Zed\Sales\Business\OrderWriter\SalesOrderWriterInterface as SprykerSalesOrderWriterInterface;

interface SalesOrderWriterInterface extends SprykerSalesOrderWriterInterface
{
    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Generated\Shared\Transfer\SpySalesOrderEntityTransfer $salesOrderEntityTransfer
     *
     * @return \Generated\Shared\Transfer\SpySalesOrderEntityTransfer
     */
    public function hydrateSalesOrderEntityTransfer(
        QuoteTransfer $quoteTransfer,
        SpySalesOrderEntityTransfer $salesOrderEntityTransfer
    ): SpySalesOrderEntityTransfer;
}
