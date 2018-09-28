<?php

namespace Jonas\ProfileBundle\Step\Registration;

use Jonas\ProfileBundle\Form\Registration\WelcomeForm;
use Jonas\ProfileBundle\Step\StepInterface;

final class WelcomeStep implements StepInterface
{
    public function getForm(): string
    {
        return WelcomeForm::class;
    }

    public function getTemplate(): string
    {
        return 'JonasProfileBundle:Step:Welcome.html.twig';
    }
}
