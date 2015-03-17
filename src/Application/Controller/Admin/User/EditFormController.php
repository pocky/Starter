<?php

namespace Application\Controller\Admin\User;

use Black\Component\User\Application\DTOAssembler\AccountUserAssembler;
use Black\Component\User\Domain\Exception\UserNotFoundException;
use Black\Component\User\Domain\Model\UserId;
use Black\Component\User\Infrastructure\Service\UserReadService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Form\Form;

/**
 * Class EditFormController
 *
 * @Route("/admin/user", service="application.controller.admin.user.edit_form")
 */
class EditFormController
{
    /**
     * @var UserReadService
     */
    protected $readService;

    /**
     * @var AccountUserAssembler
     */
    protected $assembler;

    /**
     * @var TwigEngine
     */
    protected $templating;

    /**
     * @var Form
     */
    protected $accountForm;

    /**
     * @param UserReadService $readService
     * @param AccountUserAssembler $assembler
     * @param Form $accountForm
     * @param TwigEngine $templating
     */
    public function __construct(
        UserReadService $readService,
        AccountUserAssembler $assembler,
        Form $accountForm,
        TwigEngine $templating
    ) {
        $this->readService = $readService;
        $this->assembler   = $assembler;
        $this->accountForm = $accountForm;
        $this->templating  = $templating;
    }

    /**
     * @Route("/form/{id}/edit.html", name="admin_user_edit_form")
     *
     * @return array
     */
    public function editFormAction($id)
    {
        $user = $this->readService->find(new UserId($id));

        if (!$user) {
            throw new UserNotFoundException();
        }

        $accountDto = $this->assembler->transform($user);
        $this->accountForm->setData($accountDto);

        return $this->templating->renderResponse('admin/user/edit_form.html.twig', [
            'accountForm' => $this->accountForm->createView(),
        ]);
    }
}
