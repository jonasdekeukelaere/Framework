<?php

namespace Jonas\ProfileBundle\Flow;

use Jonas\ProfileBundle\Step\StudentStep1;

final class StudentFlow extends Flow
{
    public function steps(): array
    {
        return [
            'stap-4' => StudentStep1::class,
        ];
    }

    public function getFlowName(): string
    {
        return 'student';
    }
}
