<?php

namespace Jonas\ProfileBundle\Step;

interface StepInterface
{
    public function getForm(): string;
    public function getTemplate(): string;
}
