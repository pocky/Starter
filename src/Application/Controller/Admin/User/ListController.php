<?php

namespace Application\Controller\Admin\User;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Black\Component\User\Application\Controller\ListController as Controller;

/**
 * Class ListController
 *
 * @author Alexandre Balmes <${COPYRIGHT_NAME}>
 * @license ${COPYRIGHT_LICENCE}
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
     */
    public function indexAction()
    {
        $users = $this->controller->listUsersAction();

        return $this->templating->renderResponse('admin/user/list.html.twig', [
            'users' => $users,
        ]);
    }
}
