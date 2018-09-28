<?php

namespace Jonas\ProfileBundle\Flow;

use Jonas\ProfileBundle\Step\Registration\PersonalDataStep;
use Jonas\ProfileBundle\Step\Registration\TypeStep;
use Jonas\ProfileBundle\Step\Registration\WelcomeStep;

final class RegistrationFlow extends Flow
{
    public function steps(): array
    {
        return [
            'stap-1' => WelcomeStep::class,
            'stap-2' => PersonalDataStep::class,
            'stap-3' => TypeStep::class,
        ];
    }

    public function getFlowName(): string
    {
        return 'registration';
    }
}
