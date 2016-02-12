<?php

namespace spec\Black\Website\Infrastructure\CQRS\Handler;

use Black\Website\Domain\Repository\WebsiteRepository;
use Black\Website\Domain\ValueObject\Author;
use Black\Website\Infrastructure\CQRS\Command\CreateWebsiteCommand;
use Black\Website\Infrastructure\Service\WriteService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CreateWebsiteHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Infrastructure\CQRS\Handler\CreateWebsiteHandler');
    }

    function let(WriteService $service, WebsiteRepository $repository, EventDispatcherInterface $dispatcher)
    {
        $class = 'Black\Website\Domain\Entity\Website';
        $repository->getClassName()->willReturn($class);

        $this->beConstructedWith($service, $repository, $dispatcher);
    }

    function it_should_handle_a_command(CreateWebsiteCommand $command)
    {
        $command->getName()->willReturn("name");
        $command->getDescription()->willReturn("description");
        $command->getAuthor()->willReturn(new Author("John doe"));
        $command->getLanguage()->willReturn("fr_FR");

        $this->handle($command);
    }
}
