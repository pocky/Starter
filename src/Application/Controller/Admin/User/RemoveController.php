<?php

namespace Application\Controller\Admin\User;

use Black\Component\User\Domain\Model\UserId;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Black\Component\User\Application\Controller\RemoveController as Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

/**
 * Class RemoveController
 *
 * @author Alexandre Balmes <${COPYRIGHT_NAME}>
 * @license ${COPYRIGHT_LICENCE}
 *
 * @Route("/admin/users", service="application.controller.admin.user.remove")
 */
class RemoveController
{
    /**
     * @var Controller
     */
    protected $controller;

    /**
     * @var Router
     */
    protected $router;

    /**
     * @param Controller $controller
     * @param Router $router
     */
    public function __construct(
        Controller $controller,
        Router $router
    ) {
        $this->controller = $controller;
        $this->router = $router;
    }

    /**
     * @Route("/remove/{id}", name="admin_user_remove")
     */
    public function indexAction($id)
    {
        $this->controller->removeUserAction(new UserId($id));

        return new RedirectResponse($this->router->generate('admin_users_list'));
    }
}
