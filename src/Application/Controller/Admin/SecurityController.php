<?php

namespace Application\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\SecurityContext;

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
     * @var RequestStack
     */
    protected $requestStack;

    protected $form;

    /**
     * @param TwigEngine $templating
     */
    public function __construct(
        TwigEngine $templating,
        RequestStack $requestStack,
        Form $form
    ) {
        $this->templating = $templating;
        $this->requestStack = $requestStack;
        $this->form = $form;
    }

    /**
     * @Route("/login", name="admin_login")
     */
    public function loginAction()
    {
        $request = $this->requestStack->getCurrentRequest();
        $session = $request->getSession();

        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->templating->renderResponse('admin/security/login.html.twig', [
            'form'          => $this->form->createView(),
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ]);
    }

    /**
     * @Route("/hello/{name}")
     */
    public function indexAction($name)
    {
        return $this->templating->renderResponse('admin/default/index.html.twig', [
            'name' => $name
        ]);
    }
}
