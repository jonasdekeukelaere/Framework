<?php

namespace Jonas\ProfileBundle\Flow;

use Jonas\ProfileBundle\Step\StepInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface FlowInterface
{
    public function steps(): array;
    public function getStep(string $stepName): StepInterface;
    public function getNextStepName(string $stepName): ?string;
    public function getFlowName(): string;
    public function displayStep(Request $request, string $stepName): Response;
    public function handleStep(FormInterface $form, string $stepName): Response;
}
