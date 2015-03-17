<?php

namespace Application\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\TwigBundle\TwigEngine;

/**
 * Class DefaultController
 *
 * @Route(service="application.controller.default")
 */
class DefaultController
{
    /**
     * @var TwigEngine
     */
    protected $templating;

    /**
     * @param TwigEngine $templating
     */
    public function __construct(TwigEngine $templating)
    {
        $this->templating = $templating;
    }

    /**
     * @Route("/hello/{name}")
     */
    public function indexAction($name)
    {
        return $this->templating->renderResponse('default/index.html.twig', [
            'name' => $name
        ]);
    }
}
