<?php

namespace Application\Controller\Admin\User;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Black\Component\User\Application\Controller\CreateController as Controller;

/**
 * Class CreateController
 *
 * @author Alexandre Balmes <${COPYRIGHT_NAME}>
 * @license ${COPYRIGHT_LICENCE}
 *
 * @Route("/admin/user/form", service="application.controller.admin.user.create")
 */
class CreateFormController
{
    /**
     * @var Controller
     */
    protected $controller;

    /**
     * @var TwigEngine
     */
    protected $templating;

    /**
     * @param TwigEngine $templating
     */
    public function __construct(
        Controller $controller,
        TwigEngine $templating
    ) {
        $this->controller = $controller;
        $this->templating = $templating;
    }

    /**
     * @Route("/create.html", name="dedale_create_form")
     * @Template("BlackroomDedaleBundle:Default:create_form.html.twig")
     *
     * @return array
     */
    public function createFormAction()
    {
        $form = $this->get('black_page.application.form.create_web_page');

        return [
            'form' => $form->createView(),
        ];
    }
}
