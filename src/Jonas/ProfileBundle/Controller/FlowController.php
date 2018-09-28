<?php

namespace Jonas\ProfileBundle\Controller;

use Jonas\ProfileBundle\Flow\FlowFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class FlowController
{
    /** @var FlowFactory */
    private $flowFactory;

    public function __construct(FlowFactory $flowFactory)
    {
        $this->flowFactory = $flowFactory;
    }

    public function flowAction(Request $request, string $flowName, string $stepName): Response
    {
        return $this->flowFactory->getFlow($flowName)->displayStep($request, $stepName);
    }
}
