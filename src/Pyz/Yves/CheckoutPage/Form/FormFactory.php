<?php

namespace Pyz\Yves\CheckoutPage\Form;

use Pyz\Yves\CheckoutPage\Form\Steps\OrderDetailsForm;
use Spryker\Yves\StepEngine\Form\FormCollectionHandlerInterface;
use SprykerShop\Yves\CheckoutPage\Form\FormFactory as SprykerFormFactory;

class FormFactory extends SprykerFormFactory
{
    /**
     * @return FormCollectionHandlerInterface
     */
    public function createOrderDetailsFormCollection(): FormCollectionHandlerInterface
    {
        return $this->createFormCollection($this->getOrderDetailsFormTypes());
    }

    /**
     * @return array<string>
     */
    public function getOrderDetailsFormTypes(): array
    {
        return [
            $this->getOrderDetailsForm(),
        ];
    }

    /**
     * @return string
     */
    public function getOrderDetailsForm(): string
    {
        return OrderDetailsForm::class;
    }
}
