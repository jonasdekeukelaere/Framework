<?php

namespace Jonas\ProfileBundle\Flow;

use Jonas\ProfileBundle\Step\StepInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Templating\EngineInterface;

abstract class Flow implements FlowInterface
{
    /** @var FormFactoryInterface */
    protected $formFactory;

    /** @var EngineInterface */
    protected $twig;

    /** @var RouterInterface */
    protected $router;

    public function __construct(FormFactoryInterface $formFactory, EngineInterface $twig, RouterInterface $router)
    {
        $this->formFactory = $formFactory;
        $this->twig = $twig;
        $this->router = $router;
    }

    public function getStep(string $stepName): StepInterface
    {
        if (!array_key_exists($stepName, $this->steps())) {
            throw new NotFoundHttpException('Step not found');
        }

        $stepClass = $this->steps()[$stepName];

        return new $stepClass(
            $this->formFactory,
            $this->twig,
            $this->router,
            $this->getFlowName(),
            $this->getNextStepName($stepName)
        );
    }

    public function getNextStepName(string $stepName): ?string
    {
        if (!array_key_exists($stepName, $this->steps())) {
            throw new NotFoundHttpException('Step not found');
        }

        $orderedSteps = array_keys($this->steps());

        $currentStepIndex = array_search($stepName, $orderedSteps);

        if (array_key_exists($currentStepIndex + 1, $orderedSteps)) {
            return $orderedSteps[$currentStepIndex + 1];
        }

        return null;
    }

    public function displayStep(Request $request, string $stepName): Response
    {
        $step = $this->getStep($stepName);

        // todo check if step requirements are met, so people don't skip steps
//        if (!$step->getValidator()->validate()) {
//            return new RedirectResponse($this->getRedirectUrl($lastStepName));
//        }

        $form = $this->formFactory->create($step->getForm());
        $form->handleRequest($request);

        return $this->handleStep($form, $stepName);
    }

    public function handleStep(FormInterface $form, string $stepName): Response
    {
        $step = $this->getStep($stepName);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return new Response(
                $this->twig->render(
                    $step->getTemplate(),
                    [
                        'form' => $form->createView(),
                    ]
                )
            );
        }

        // todo save data. session? temp db object?

        $nextStepName = $this->getNextStepName($stepName);

        return $this->getRedirectUrl($nextStepName);
    }

    private function getRedirectUrl(?string $stepName): RedirectResponse
    {
        if ($stepName === null) {
            // todo redirect to succes page?
            die('end');
        }

        if ($this->getFlowName() === 'registration') {
            return new RedirectResponse(
                $this->router->generate(
                    'jonas.routing.flow.default',
                    [
                        'stepName' => $stepName,
                    ]
                )
            );
        }

        return new RedirectResponse(
            $this->router->generate(
                'jonas.routing.flow.specific',
                [
                    'flowName' => $this->getFlowName(),
                    'stepName' => $stepName,
                ]
            )
        );
}
}
