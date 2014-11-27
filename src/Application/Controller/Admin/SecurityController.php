<?php

namespace Application\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SecurityController
 *
 * @author Alexandre Balmes <${COPYRIGHT_NAME}>
 * @license ${COPYRIGHT_LICENCE}
 *
 * @Route("/admin", service="application.controller.admin.security")
 */
class SecurityController
{
    /**
     * @var TwigEngine
     */
    protected $templating;

    /**
     * @var AuthenticationUtils
     */
    protected $helper;

    /**
     * @var Form
     */
    protected $form;

    /**
     * @param TwigEngine $templating
     * @param AuthenticationUtils $helper
     * @param Form $form
     */
    public function __construct(
        TwigEngine $templating,
        AuthenticationUtils $helper,
        Form $form
    ) {
        $this->templating = $templating;
        $this->helper = $helper;
        $this->form = $form;
    }

    /**
     * @Route("/login", name="admin_login")
     */
    public function loginAction()
    {
        return $this->templating->renderResponse('admin/security/login.html.twig', [
            'form'          => $this->form->createView(),
            'last_username' => $this->helper->getLastUsername(),
            'error'         => $this->helper->getLastAuthenticationError(),
        ]);
    }
}
