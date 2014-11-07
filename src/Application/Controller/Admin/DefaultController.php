<?php

namespace Application\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\TwigBundle\TwigEngine;

/**
 * Class DefaultController
 *
 * @author Alexandre Balmes <${COPYRIGHT_NAME}>
 * @license ${COPYRIGHT_LICENCE}
 *
 * @Route("/admin", service="application.controller.admin.default")
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
     * @Route("/", name="admin_index")
     */
    public function indexAction()
    {
        return $this->templating->renderResponse('admin/default/index.html.twig');
    }
}
