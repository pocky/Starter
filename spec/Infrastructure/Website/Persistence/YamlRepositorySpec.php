<?php

namespace spec\Infrastructure\Website\Persistence;

use Domain\Website\Entity\Website;
use Domain\Website\ValueObject\WebsiteId;
use Domain\Website\ValueObject\Author;
use org\bovigo\vfs\vfsStream;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class YamlRepositorySpec extends ObjectBehavior
{
    protected $cache;

    function it_is_initializable()
    {
        $this->shouldHaveType('Infrastructure\Website\Persistence\YamlRepository');
        $this->shouldImplement('Domain\Website\Repository\WebsiteRepository');
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

        $this->add($website);

        $website = $this->find(new WebsiteId(1234));
        $website->getWebsiteId()->getValue()->shouldReturn(1234);
    }

    function it_should_remove_a_website(Website $website)
    {
        $website->getWebsiteId()->willReturn(1234);

        $this->remove($website);
        $this->findAll()->shouldReturn([]);
    }
}
