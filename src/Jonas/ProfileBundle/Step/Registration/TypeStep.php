<?php

namespace Jonas\ProfileBundle\Step\Registration;

use Jonas\ProfileBundle\Form\Registration\PersonalDataForm;
use Jonas\ProfileBundle\Form\Registration\TypeForm;
use Jonas\ProfileBundle\Step\StepInterface;

final class TypeStep implements StepInterface
{
    public function getForm(): string
    {
        return TypeForm::class;
    }

    public function getTemplate(): string
    {
        return 'JonasProfileBundle:Step:Type.html.twig';
    }
}
