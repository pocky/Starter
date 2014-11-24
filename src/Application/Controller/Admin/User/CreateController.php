<?php

namespace Application\Controller\Admin\User;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Form\Form;

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
     * @var TwigEngine
     */
    protected $templating;

    /**
     * @var Form
     */
    protected $form;

    /**
     * @param TwigEngine $templating
     * @param Form $form
     */
    public function __construct(
        Form $form,
        TwigEngine $templating
    ) {
        $this->form       = $form;
        $this->templating = $templating;
    }

    /**
     * @Route("/form/create.html", name="admin_user_create_form")
     *
     * @return array
     */
    public function createFormAction()
    {
        return $this->templating->renderResponse('admin/user/create_form.html.twig', [
            'form' => $this->form->createView(),
        ]);
    }
}
