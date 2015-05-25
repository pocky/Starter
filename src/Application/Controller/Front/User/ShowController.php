<?php

namespace Application\Controller\Front\User;

use Application\DTOAssembler\ShowUserAssembler;
use Black\Component\User\Domain\Model\UserId;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Black\Component\User\Application\Controller\ShowUserController as Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ShowController
 *
 * @Route("/user", service="application.controller.front.user.show")
 */
class ShowController
{
    /**
     * @var Controller
     */
    protected $controller;

    /**
     * @var TwigEngine
     */
    protected $templating;

    /**
     * @var ShowUserAssembler
     */
    protected $assembler;

    /**
     * @param Controller $controller
     * @param TwigEngine $templating
     * @param ShowUserAssembler $assembler
     */
    public function __construct(
        Controller $controller,
        TwigEngine $templating,
        ShowUserAssembler $assembler
    ) {
        $this->controller = $controller;
        $this->templating = $templating;
        $this->assembler  = $assembler;
    }

    /**
     * @Route("/{userId}/show.{_format}", name="front_user_show")
     * @Method({"GET"})
     *
     * @param $userId
     * @param $_format
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($userId, $_format)
    {
        $userId     = new UserId($userId);
        $userEntity = $this->controller->showUserAction($userId);

        $user = $this->assembler->transform($userEntity);

        if ('json' === $_format) {
            $response = new JsonResponse();
            $response->setContent($user->serialize());

            return $response;
        }

        return $this->templating->renderResponse('front/user/show.html.twig', [
            'user' => $user,
        ]);
    }
}
