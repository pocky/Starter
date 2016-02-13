<?php

namespace spec\Black\Website\Infrastructure\CQRS\Handler;

use Black\Website\Domain\Entity\Website;
use Black\Website\Domain\ValueObject\Author;
use Black\Website\Infrastructure\CQRS\Command\UpdateWebsiteCommand;
use Black\Website\Infrastructure\Service\WriteService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class UpdateWebsiteHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Infrastructure\CQRS\Handler\UpdateWebsiteHandler');
    }

    function let(WriteService $service, EventDispatcherInterface $dispatcher)
    {
        $this->beConstructedWith($service, $dispatcher);
    }

    public function it_should_handle(UpdateWebsiteCommand $command, Website $website)
    {
        $command->getName()->willReturn("name");
        $command->getHeadline()->willReturn("headline");
        $command->getDescription()->willReturn("description");
        $author = new Author("John Doe");
        $command->getAuthor()->willReturn($author);
        $command->getWebsite()->willReturn($website);

        $this->handle($command);
    }
}
