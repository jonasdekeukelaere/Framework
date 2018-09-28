<?php

namespace Jonas\ProfileBundle\Flow;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class FlowFactory
{
    /** @var array */
    private $flows;

    public function __construct(array $flows)
    {
        $this->flows = $flows;
    }

    public function getFlow($flowName): Flow
    {
        if (!array_key_exists($flowName, $this->flows)) {
            throw new NotFoundHttpException('Flow not found');
        }

        return $this->flows[$flowName];
    }
}
