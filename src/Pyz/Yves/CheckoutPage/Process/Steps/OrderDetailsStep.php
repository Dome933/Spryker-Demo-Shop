<?php

namespace Pyz\Yves\CheckoutPage\Process\Steps;


use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Yves\StepEngine\Dependency\Step\StepWithBreadcrumbInterface;
use Spryker\Yves\StepEngine\Dependency\Step\StepWithCodeInterface;
use SprykerShop\Yves\CheckoutPage\Process\Steps\AbstractBaseStep;
use SprykerShop\Yves\CheckoutPage\Process\Steps\PostConditionCheckerInterface;
use SprykerShop\Yves\CheckoutPage\Process\Steps\StepExecutorInterface;
use Symfony\Component\HttpFoundation\Request;

class OrderDetailsStep extends AbstractBaseStep implements StepWithBreadcrumbInterface, StepWithCodeInterface
{
    protected const STEP_CODE = 'order-details';

    private StepExecutorInterface $stepExecutor;
    private PostConditionCheckerInterface $postConditionChecker;

    /**
     * @param StepExecutorInterface $stepExecutor
     * @param PostConditionCheckerInterface $postConditionChecker
     * @param $stepRoute
     * @param $escapeRoute
     */
    public function __construct(
        StepExecutorInterface $stepExecutor,
        PostConditionCheckerInterface $postConditionChecker,
        $stepRoute,
        $escapeRoute
    ) {
        parent::__construct($stepRoute, $escapeRoute);

        $this->stepExecutor = $stepExecutor;
        $this->postConditionChecker = $postConditionChecker;
    }

    /**
     * @param Request $request
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    public function execute(Request $request, AbstractTransfer $quoteTransfer): QuoteTransfer
    {
        return $this->stepExecutor->execute($request, $quoteTransfer);
    }

    /**
     * @param AbstractTransfer $quoteTransfer
     * @return bool
     */
    public function requireInput(AbstractTransfer $quoteTransfer): bool
    {
        return true;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     * @return bool
     */
    public function postCondition(AbstractTransfer $quoteTransfer): bool
    {
        return $this->postConditionChecker->check($quoteTransfer);
    }

    public function getBreadcrumbItemTitle(): string
    {
        return 'checkout.step.order_details.title';
    }

    /**
     * @param AbstractTransfer $quoteTransfer
     * @return bool
     */
    public function isBreadcrumbItemEnabled(AbstractTransfer $quoteTransfer): bool
    {
        return $this->postCondition($quoteTransfer);
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function isBreadcrumbItemHidden(AbstractTransfer $quoteTransfer): bool
    {
        return !$this->requireInput($quoteTransfer);
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return static::STEP_CODE;
    }
}
