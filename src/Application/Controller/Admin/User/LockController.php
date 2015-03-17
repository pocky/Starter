<?php

namespace Application\Controller\Admin\User;

use Black\Component\User\Application\Controller\LockUserController as Controller;
use Black\Component\User\Application\DTO\LockUserDTO;
use Black\Component\User\Domain\Model\UserId;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

/**
 * Class ActiveController
 *
<<<<<<< HEAD
 * @author Alexandre Balmes <${COPYRIGHT_NAME}>
 * @license ${COPYRIGHT_LICENCE}
 *
=======
>>>>>>> master
 * @Route("/admin/user", service="application.controller.admin.user.lock")
 */
class LockController
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
     * @Route("/{id}/lock", name="admin_user_lock")
     * @Method({"GET"})
     *
     * @return array
     */
    public function lockUserAction($id)
    {
        $dto = new LockUserDTO(new UserId($id));
        $this->controller->lockUserAction($dto->getId());

        return new RedirectResponse($this->router->generate('admin_users_list'));
    }
}
