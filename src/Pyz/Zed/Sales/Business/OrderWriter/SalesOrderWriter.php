<?php

namespace Pyz\Zed\Sales\Business\OrderWriter;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\SpySalesOrderEntityTransfer;
use Spryker\Zed\Sales\Business\OrderWriter\SalesOrderWriter as SprykerSalesOrderWriter;

class SalesOrderWriter extends SprykerSalesOrderWriter implements SalesOrderWriterInterface
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
    ): SpySalesOrderEntityTransfer {
        $salesOrderEntityTransfer->setCustomerReference($quoteTransfer->getCustomer()->getCustomerReference());
        $salesOrderEntityTransfer = $this->hydrateSalesOrderCustomer($quoteTransfer, $salesOrderEntityTransfer);
        $salesOrderEntityTransfer->setPriceMode($quoteTransfer->getPriceMode());
        $salesOrderEntityTransfer->setStore($this->storeFacade->getCurrentStore()->getName());
        $salesOrderEntityTransfer->setCurrencyIsoCode($quoteTransfer->getCurrency()->getCode());
        $salesOrderEntityTransfer->setOrderReference($this->orderReferenceGenerator->generateOrderReference($quoteTransfer));
        $salesOrderEntityTransfer->setOrderName($quoteTransfer->getOrderName());
        $salesOrderEntityTransfer->setIsTest($this->salesConfiguration->isTestOrder($quoteTransfer));

        $salesOrderEntityTransfer = $this->executeOrderExpanderPreSavePlugins($quoteTransfer, $salesOrderEntityTransfer);

        return $salesOrderEntityTransfer;
    }
}
