<?php

namespace Application\Controller\Admin\User;

use Black\Component\User\Application\Controller\DeactiveUserController;
use Black\Component\User\Application\DTO\DeactiveUserDTO;
use Black\Component\User\Domain\Model\UserId;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

/**
 * Class DeactiveController
 *
 * @Route("/admin/user", service="application.controller.admin.user.deactive")
 */
class DeactiveController
{
    /**
     * @var DeactiveUserController
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
     * @param DeactiveUserController $controller
     * @param Router $router
     */
    public function __construct(
        DeactiveUserController $controller,
        Router $router
    ) {
        $this->controller = $controller;
        $this->router     = $router;
    }

    /**
     * @Route("/{id}/deactive", name="admin_user_deactive")
     * @Method({"GET"})
     *
     * @return array
     */
    public function deactiveUserAction($id)
    {
        $dto = new DeactiveUserDTO(new UserId($id));
        $this->controller->deactiveUserAction($dto->getId());

        return new RedirectResponse($this->router->generate('admin_users_list'));
    }
}
