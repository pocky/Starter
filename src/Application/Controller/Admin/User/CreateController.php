<?php

namespace Application\Controller\Admin\User;

use Black\Bundle\UserBundle\Application\Form\Handler\CreateAccountHandler;
use Black\Component\User\Application\Controller\CreateUserController as Controller;
use Black\Component\User\Domain\Model\UserId;
use Email\EmailAddress;
use Rhumsaa\Uuid\Uuid;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

/**
 * Class CreateController
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
     * @var Router
     */
    protected $router;

    /**
     * @param Controller $controller
     * @param CreateAccountHandler $handler
     * @param Router $router
     */
    public function __construct(
        Controller $controller,
        CreateAccountHandler $handler,
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
            $email = new EmailAddress($dto->getEmail());

            $this->controller->createUserAction($id, $dto->getName(), $email);
        }

        return new RedirectResponse($this->router->generate('admin_users_list'));
    }
}
