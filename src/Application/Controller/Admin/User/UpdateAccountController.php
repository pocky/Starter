<?php

namespace Application\Controller\Admin\User;

use Black\Bundle\UserBundle\Application\Form\Handler\UpdateAccountHandler;
use Black\Component\User\Application\Controller\UpdateAccountController as Controller;
use Black\Component\User\Domain\Model\UserId;
use Black\Component\User\Infrastructure\Service\UserReadService;
use Email\EmailAddress;
use Rhumsaa\Uuid\Uuid;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

/**
 * Class UpdateController
 *
 * @Route("/admin/user", service="application.controller.admin.user.update_account")
 */
class UpdateAccountController
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
     * @param UpdateAccountHandler $handler
     * @param UserReadService $service
     */
    public function __construct(
        Controller $controller,
        UpdateAccountHandler $handler,
        UserReadService $service,
        Router $router
    ) {
        $this->controller = $controller;
        $this->handler    = $handler;
        $this->service    = $service;
        $this->router     = $router;
    }

    /**
     * @Route("/update_account", name="admin_user_update_account")
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
                $address = new EmailAddress($dto->getEmail());
                $this->controller->updateAccountAction($user, $dto->getName(), $address);

                return new RedirectResponse($this->router->generate('admin_user_update_form', [
                    'id' => $user->getUserId()
                ]));
            }

        }

        return new RedirectResponse($this->router->generate('admin_users_list'));
    }
}
