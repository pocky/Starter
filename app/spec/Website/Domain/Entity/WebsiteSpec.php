<?php

namespace spec\Black\Website\Domain\Entity;

use Black\Website\Domain\ValueObject\Author;
use Black\Website\Domain\ValueObject\WebsiteId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WebsiteSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Black\Website\Domain\Entity\Website');
    }

    function let()
    {
        $websiteId = new WebsiteId(1234);
        $author = new Author("john doe");
        $this->beConstructedWith($websiteId, "name", "description", $author);
    }

    public function it_should_get_website_id()
    {
        $this->getWebsiteId()->getValue()->shouldReturn("1234");
    }

    function it_should_have_a_name()
    {
        $this->getName()->shouldReturn("name");
    }

    function it_should_have_a_description()
    {
        $this->getDescription()->shouldReturn("description");
    }

    public function it_should_have_an_author()
    {
        $this->getAuthor()->getValue()->shouldReturn("john doe");
    }

    public function it_should_have_a_creation_date()
    {
        $this->getCreatedAt()->shouldBeAnInstanceOf('\DateTime');
    }

    public function it_shound_not_be_activated()
    {
        $this->getStatus()->shouldReturn("inactive");
    }

    public function it_should_activate()
    {
        $this->activate();
        $this->getStatus()->shouldReturn("active");
        $this->getUpdatedtAt()->shouldBeAnInstanceOf('\DateTime');
    }

    public function it_should_disable()
    {
        $this->disable();
        $this->getStatus()->shouldReturn("inactive");
        $this->getUpdatedtAt()->shouldBeAnInstanceOf('\DateTime');
    }

    public function it_should_update()
    {
        $author = new Author("John doe");
        $this->update("name", "description", $author);
    }
}
