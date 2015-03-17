<?php

namespace Application\Controller\Admin\Procedure;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Form\Form;

/**
 * Class CreateFormController
 *
 * @Route("/admin/procedure")
 */
class CreateFormController
{
    /**
     * @var Form
     */
    protected $form;

    /**
     * @var TwigEngine
     */
    protected $templating;

    /**
     * @param Form $form
     * @param TwigEngine $templating
     */
    public function __construct(Form $form, TwigEngine $templating)
    {
        $this->form = $form;
        $this->templating = $templating;
    }

    /**
     * @Route("/form/create.html", name="admin_procedure_create_form")
     */
    public function createFormAction()
    {
        return $this->templating->renderResponse('admin/procedure/create_form.html.twig', [

        ]);
    }
}
