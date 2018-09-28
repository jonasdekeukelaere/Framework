<?php

namespace Jonas\ProfileBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

final class StudentStep1Form extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'university',
            ChoiceType::class,
            [
                'choices' => [
                    'Ghent' => 'ghent',
                ],
                'placeholder' => '',
            ]
        );
    }
}
