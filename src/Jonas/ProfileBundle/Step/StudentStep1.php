<?php

namespace Jonas\ProfileBundle\Step;

use Jonas\ProfileBundle\Form\StudentStep1Form;

final class StudentStep1 implements StepInterface
{
    public function getForm(): string
    {
        return StudentStep1Form::class;
    }

    public function getTemplate(): string
    {
        return 'JonasProfileBundle:Step:Step1.html.twig';
    }
}
