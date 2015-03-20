<?php

namespace Application\Controller\Admin\User;

use Black\Component\User\Application\DTOAssembler\UpdateAccountAssembler;
use Black\Component\User\Application\DTOAssembler\UpdatePasswordAssembler;
use Black\Component\User\Domain\Exception\UserNotFoundException;
use Black\Component\User\Domain\Model\UserId;
use Black\Component\User\Infrastructure\Service\UserReadService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Form\Form;

/**
 * Class UpdateFormController
 *
 * @Route("/admin/user", service="application.controller.admin.user.update_form")
 */
class UpdateFormController
{
    /**
     * @var UserReadService
     */
    protected $readService;

    /**
     * @var UpdateAccountAssembler
     */
    protected $accountAssembler;

    /**
     * @var UpdatePasswordAssembler
     */
    protected $passwordAssembler;

    /**
     * @var TwigEngine
     */
    protected $templating;

    /**
     * @var Form
     */
    protected $accountForm;

    /**
     * @var Form
     */
    protected $passwordForm;

    /**
     * @param UserReadService $readService
     * @param UpdateAccountAssembler $accountAssembler
     * @param UpdatePasswordAssembler $passwordAssembler
     * @param Form $accountForm
     * @param Form $passwordForm
     * @param TwigEngine $templating
     */
    public function __construct(
        UserReadService $readService,
        UpdateAccountAssembler $accountAssembler,
        UpdatePasswordAssembler $passwordAssembler,
        Form $accountForm,
        Form $passwordForm,
        TwigEngine $templating
    ) {
        $this->readService       = $readService;
        $this->accountAssembler  = $accountAssembler;
        $this->passwordAssembler = $passwordAssembler;
        $this->accountForm       = $accountForm;
        $this->passwordForm      = $passwordForm;
        $this->templating        = $templating;
    }

    /**
     * @Route("/form/{id}/update.html", name="admin_user_update_form")
     *
     * @return array
     */
    public function updateFormAction($id)
    {
        $user = $this->readService->find(new UserId($id));

        if (!$user) {
            throw new UserNotFoundException();
        }

        $accountDto = $this->accountAssembler->transform($user);
        $this->accountForm->setData($accountDto);

        $passwordDto = $this->passwordAssembler->transform($user);
        $this->passwordForm->setData($passwordDto);

        return $this->templating->renderResponse('admin/user/update_form.html.twig', [
            'accountForm' => $this->accountForm->createView(),
            'passwordForm' => $this->passwordForm->createView(),
        ]);
    }
}
