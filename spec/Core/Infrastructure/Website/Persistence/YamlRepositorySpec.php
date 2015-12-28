<?php

namespace spec\Black\Core\Infrastructure\Website\Persistence;

use Black\Core\Domain\Website\Entity\Website;
use Black\Core\Domain\Website\Entity\WebsiteStatus;
use Black\Core\Domain\Website\ValueObject\WebsiteId;
use Black\Core\Domain\Website\ValueObject\Author;
use org\bovigo\vfs\vfsStream;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class YamlRepositorySpec extends ObjectBehavior
{
    protected $cache;

    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Core\Infrastructure\Website\Persistence\YamlRepository');
        $this->shouldImplement('Black\Core\Domain\Website\Repository\WebsiteRepository');
    }

    function let()
    {
        vfsStream::setup('cache');
        $this->beConstructedWith(vfsStream::url('cache/website.yml'));
    }

    function it_should_not_find_any_website()
    {
        $this->findAll()->shouldBeArray();
        $this->findAll()->shouldReturn([]);
    }

    function it_should_find_a_website(Website $website)
    {
        $websiteId = new WebsiteId(1234);
        $author = new Author("john");
        $website->getWebsiteId()->willReturn($websiteId);
        $website->getName()->willReturn("name");
        $website->getDescription()->willReturn("description");
        $website->getAuthor()->willReturn($author);
        $website->getCreatedAt()->willReturn(new \DateTime());
        $website->getStatus()->willReturn(WebsiteStatus::INACTIVE);

        $this->add($website);

        $website = $this->find(new WebsiteId(1234));
        $website->getWebsiteId()->getValue()->shouldReturn("1234");
    }

    function it_should_remove_a_website(Website $website)
    {
        $website->getWebsiteId()->willReturn("1234");

        $this->remove($website);
        $this->findAll()->shouldReturn([]);
    }

    function it_should_update_a_website(Website $website)
    {
        $id = new WebsiteId(1234);
        $author = new Author("john");
        $website->getWebsiteId()->willReturn($id);
        $website->getName()->willReturn("name");
        $website->getDescription()->willReturn("description");
        $website->getAuthor()->willReturn($author);
        $website->getCreatedAt()->willReturn(new \DateTime());
        $website->getStatus()->willReturn(WebsiteStatus::INACTIVE);
        $this->add($website);

        $website->getName()->willReturn("test2");
        $website->getUpdatedtAt()->willReturn(new \DateTime());
        $this->update($website);

        $website = $this->find($id);
        $website->getName()->shouldReturn("test2");
    }
}
