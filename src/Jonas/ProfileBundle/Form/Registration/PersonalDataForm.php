<?php

namespace Jonas\ProfileBundle\Form\Registration;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class PersonalDataForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'firstName',
            TextType::class
        );
        $builder->add(
            'lastName',
            TextType::class
        );
        $builder->add(
            'email',
            EmailType::class
        );
        $builder->add(
            'phone',
            TextType::class,
            [
                'required' => false,
            ]
        );
    }
}
