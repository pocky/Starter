<?php

namespace Application\Controller\Admin\User;

use Black\Bundle\UserBundle\Application\Form\Handler\UpdatePasswordHandler;
use Black\Component\User\Application\Controller\UpdatePasswordController as Controller;
use Black\Component\User\Domain\Model\UserId;
use Black\Component\User\Infrastructure\Service\UserReadService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

/**
 * Class UpdateController
 *
 * @Route("/admin/user", service="application.controller.admin.user.update_password")
 */
class UpdatePasswordController
{
    /**
     * @var Controller
     */
    protected $controller;

    /**
     * @var
     */
    protected $handler;

    /**
     * @var
     */
    protected $service;

    /**
     * @var Router
     */
    protected $router;

    /**
     * @param Controller $controller
     * @param UpdatePasswordHandler $handler
     * @param UserReadService $service
     * @param Router $router
     */
    public function __construct(
        Controller $controller,
        UpdatePasswordHandler $handler,
        UserReadService $service,
        Router $router
    ) {
        $this->controller = $controller;
        $this->handler    = $handler;
        $this->service    = $service;
        $this->router     = $router;
    }

    /**
     * @Route("/update_password", name="admin_user_update_password")
     * @Method({"POST"})
     *
     * @return array
     */
    public function updateAccountAction()
    {
        $dto = $this->handler->process();

        if ($dto) {
            $userId = new UserId($dto->getId());
            $user = $this->service->find($userId);

            if ($user) {
                $this->controller->updateAccountAction($user, $dto->getName(), $dto->getPassword());

                return new RedirectResponse($this->router->generate('admin_user_update_form', [
                    'id' => $user->getUserId()
                ]));
            }

        }

        return new RedirectResponse($this->router->generate('admin_users_list'));
    }
}
