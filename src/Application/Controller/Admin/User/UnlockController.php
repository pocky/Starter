<?php

namespace Application\Controller\Admin\User;

use Black\Component\User\Application\Controller\UnlockUserController as Controller;
use Black\Component\User\Application\DTO\UnlockUserDTO;
use Black\Component\User\Domain\Model\UserId;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

/**
 * Class ActiveController
 *
 * @Route("/admin/user", service="application.controller.admin.user.unlock")
 */
class UnlockController
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
     * @var EventDispatcher
     */
    protected $dispatcher;

    /**
     * @param Controller $controller
     * @param Router $router
     */
    public function __construct(
        Controller $controller,
        Router $router
    ) {
        $this->controller = $controller;
        $this->router     = $router;
    }

    /**
     * @Route("/{id}/unlock", name="admin_user_unlock")
     * @Method({"GET"})
     *
     * @return array
     */
    public function unlockUserAction($id)
    {
        $dto = new UnlockUserDTO(new UserId($id));
        $this->controller->unlockUserAction($dto->getId());

        return new RedirectResponse($this->router->generate('admin_users_list'));
    }
}
