<?php

namespace spec\Infrastructure\Website\CQRS;

use Domain\Website\ValueObject\Author;
use Infrastructure\Website\CQRS\CreateWebsiteCommand;
use Infrastructure\Website\Service\WriteService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateWebsiteHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Infrastructure\Website\CQRS\CreateWebsiteHandler');
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
