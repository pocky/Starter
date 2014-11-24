<?php

namespace Application\Controller\Admin\User;

use Black\Component\User\Application\Controller\CreateController as Controller;
use Black\Bundle\UserBundle\Application\Form\Handler\CreateUserHandler;
use Black\Component\User\Domain\Model\UserId;
use Rhumsaa\Uuid\Uuid;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

/**
 * Class CreateController
 *
 * @author Alexandre Balmes <${COPYRIGHT_NAME}>
 * @license ${COPYRIGHT_LICENCE}
 *
 * @Route("/admin/user", service="application.controller.admin.user.create")
 */
class CreateController
{
    /**
     * @var Controller
     */
    protected $controller;

    /**
     * @var CreateUserHandler
     */
    protected $handler;

    /**
     * @var Router
     */
    protected $router;

    /**
     * @param Controller $controller
     * @param CreateUserHandler $handler
     * @param Router $router
     */
    public function __construct(
        Controller $controller,
        CreateUserHandler $handler,
        Router $router
    ) {
        $this->controller = $controller;
        $this->handler    = $handler;
        $this->router     = $router;
    }

    /**
     * @Route("/create", name="admin_user_create")
     * @Method({"POST"})
     *
     * @return array
     */
    public function createUserAction()
    {
        $dto = $this->handler->process();

        if ($dto) {
            $id = new UserId(Uuid::uuid4());
            $this->controller->createUserAction($id, $dto->getName(), $dto->getEmail());
        }

        return new RedirectResponse($this->router->generate('admin_users_list'));
    }
}
