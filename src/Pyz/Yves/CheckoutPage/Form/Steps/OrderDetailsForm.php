<?php

namespace Pyz\Yves\CheckoutPage\Form\Steps;


use Spryker\Yves\Kernel\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class OrderDetailsForm extends AbstractType
{
    /**
     * @var string
     */
    public const FIELD_ORDER_NAME = 'order_name';

    /**
     * Builds the form.
     *
     * This method is called for each type in the hierarchy starting from the
     * top most type. Type extensions can further modify the form.
     *
     * @see FormTypeExtensionInterface::buildForm()
     *
     * @param \Symfony\Component\Form\FormBuilderInterface $builder The form builder
     * @param array<string, mixed> $options The options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addOrderDetailsNameField($builder);
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getBlockPrefix(): string
    {
        return 'orderDetailsForm';
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array<string, mixed> $options
     *
     * @return $this
     */
    protected function addOrderDetailsNameField(FormBuilderInterface $builder): static
    {
        $builder->add(static::FIELD_ORDER_NAME, TextType::class, [
            'label' => 'checkout.step.order_details.form.field.name',
            'required' => true,
            'trim' => true,
        ]);

        return $this;
    }
}
