<?php

namespace Jonas\ProfileBundle\Form\Registration;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

final class TypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'individual',
            SubmitType::class
        );
        $builder->add(
            'group',
            SubmitType::class
        );
        $builder->add(
            'student',
            SubmitType::class
        );
    }
}
