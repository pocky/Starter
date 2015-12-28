<?php

namespace spec\Black\Core\Infrastructure\Website\CQRS;

use Black\Core\Domain\Website\ValueObject\Author;
use Black\Core\Infrastructure\Website\CQRS\CreateWebsiteCommand;
use Black\Core\Infrastructure\Website\Service\WriteService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateWebsiteHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Core\Infrastructure\Website\CQRS\CreateWebsiteHandler');
    }

    function let(WriteService $service)
    {
        $this->beConstructedWith($service);
    }

    function it_should_handle_a_command(CreateWebsiteCommand $command)
    {
        $command->getName()->willReturn("name");
        $command->getDescription()->willReturn("description");
        $command->getAuthor()->willReturn(new Author("John doe"));

        $this->handle($command);
    }
}
