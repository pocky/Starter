<?php

namespace Application\Controller\Admin\User;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Black\Component\User\Application\Controller\ListUsersController as Controller;

/**
 * Class ListController
 *
 * @Route("/admin/users", service="application.controller.admin.user.list")
 */
class ListController
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
     * @param Controller $controller
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
     * @Route("/list.html", name="admin_users_list")
     * @Method({"GET"})
     */
    public function indexAction()
    {
        $users = $this->controller->listUsersAction();

        return $this->templating->renderResponse('admin/user/list.html.twig', [
            'users' => $users,
        ]);
    }
}
