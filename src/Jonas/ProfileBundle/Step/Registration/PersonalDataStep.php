<?php

namespace Jonas\ProfileBundle\Step\Registration;

use Jonas\ProfileBundle\Form\Registration\PersonalDataForm;
use Jonas\ProfileBundle\Step\StepInterface;

final class PersonalDataStep implements StepInterface
{
    public function getForm(): string
    {
        return PersonalDataForm::class;
    }

    public function getTemplate(): string
    {
        return 'JonasProfileBundle:Step:PersonalData.html.twig';
    }
}
