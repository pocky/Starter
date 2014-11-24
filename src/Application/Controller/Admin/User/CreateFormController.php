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
 * @Route("/admin/user", service="application.controller.admin.user.create_form")
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
     * @Route("/form/create.html", name="admin_user_create_form")
     *
     * @return array
     */
    public function createFormAction()
    {
        $form = $this->get('black_user.application.form.create_user');

        return $this->templating->renderResponse('admin/user/create_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
