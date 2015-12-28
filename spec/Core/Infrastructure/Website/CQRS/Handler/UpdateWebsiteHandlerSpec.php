<?php

namespace spec\Black\Core\Infrastructure\Website\CQRS\Handler;

use Black\Core\Domain\Website\Entity\Website;
use Black\Core\Domain\Website\ValueObject\Author;
use Black\Core\Infrastructure\Website\CQRS\Command\UpdateWebsiteCommand;
use Black\Core\Infrastructure\Website\Service\WriteService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UpdateWebsiteHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Core\Infrastructure\Website\CQRS\Handler\UpdateWebsiteHandler');
    }

    function let(WriteService $service)
    {
        $this->beConstructedWith($service);
    }

    public function it_should_handle(UpdateWebsiteCommand $command, Website $website)
    {
        $command->getName()->willReturn("name");
        $command->getDescription()->willReturn("description");
        $author = new Author("John Doe");
        $command->getAuthor()->willReturn($author);
        $command->getWebsite()->willReturn($website);

        $this->handle($command);
    }
}
