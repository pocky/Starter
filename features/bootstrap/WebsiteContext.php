<?php

/**
 * Defines application features from the specific context.
 */
class WebsiteContext extends DomainContext
{
    /**
     * @var \Infrastructure\Website\Persistence\InMemoryRepository
     */
    protected $repository;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        \org\bovigo\vfs\vfsStream::setup('cache');

        //$this->repository = new \Infrastructure\Website\Persistence\InMemoryRepository();
        $this->repository = new \Infrastructure\Website\Persistence\YamlRepository(\org\bovigo\vfs\vfsStream::url('cache/website.yml'));
    }

    /**
     * @Given I want to create a website with a :name, a :description and an :author
     */
    public function iWantToCreateAWebsiteWithANameADescriptionAndAnAuthor($name, $description, $author)
    {
        $websiteRepository = new Infrastructure\Website\Persistence\CQRS\WriteRepository($this->repository);
        $service = new Infrastructure\Website\Service\WriteService($websiteRepository);

        $dto = new Application\Website\DTO\CreateWebsiteDTO($name, $description, $author);
        $author = new Domain\Website\ValueObject\Author($dto->getAuthor());

        $command = new Infrastructure\Website\CQRS\CreateWebsiteCommand($dto->getName(), $dto->getDescription(), $author);
        $handler = new Infrastructure\Website\CQRS\CreateWebsiteHandler($service);
        $handler->handle($command);
    }

    /**
     * @Then I must have a website with id :identifier
     */
    public function iMustHaveAWebsiteWithId($identifier)
    {
        $websiteId = new Domain\Website\ValueObject\WebsiteId($identifier);

        $websiteRepository = new Infrastructure\Website\Persistence\CQRS\ReadRepository($this->repository);
        $service = new Infrastructure\Website\Service\ReadService($websiteRepository);
        $website = $service->find($websiteId);
    }

    /**
     * @Given I have a website
     */
    public function iHaveAWebsite()
    {
        $websiteId = new Domain\Website\ValueObject\WebsiteId(1234);
        $author = new Domain\Website\ValueObject\Author("John Doe");
        $this->website = new Domain\Website\Entity\Website($websiteId, "name2", "description", $author);

        $websiteRepository = new Infrastructure\Website\Persistence\CQRS\WriteRepository($this->repository);
        $this->service = new Infrastructure\Website\Service\WriteService($websiteRepository);
        $this->service->createWebsite($this->website);
    }

    /**
     * @Then I want to activate my website
     */
    public function iWantToActivateMyWebsite()
    {
        $id = new \Domain\Website\ValueObject\WebsiteId(1234);

        $repository = new \Infrastructure\Website\Persistence\CQRS\ReadRepository($this->repository);
        $this->website = $repository->find($id);

        $dto = new Application\Website\DTO\ActiveWebsiteDTO($this->website);
        $command = new Infrastructure\Website\CQRS\ActiveWebsiteCommand($dto->getWebsite());
        $handler = new Infrastructure\Website\CQRS\ActiveWebsiteHandler($this->service);
        $handler->handle($command);
    }

    /**
     * @Given my website can be read by a visitor
     */
    public function myWebsiteCanBeReadByAVisitor()
    {
        $specification = new Application\Website\Specification\WebsiteIsReadable();

        if ($specification->isSatisfiedBy($this->website)) {
            $this->website;
        }
    }

    /**
     * @Then I want to disable my website
     */
    public function iWantToDisableMyWebsite()
    {
        $id = new \Domain\Website\ValueObject\WebsiteId(1234);

        $repository = new \Infrastructure\Website\Persistence\CQRS\ReadRepository($this->repository);
        $this->website = $repository->find($id);

        $dto = new Application\Website\DTO\DisableWebsiteDTO($this->website);
        $command = new Infrastructure\Website\CQRS\DisableWebsiteCommand($dto->getWebsite());
        $handler = new Infrastructure\Website\CQRS\DisableWebsiteHandler($this->service);
        $handler->handle($command);
    }

    /**
     * @Given my website can't be read by a visitor
     */
    public function myWebsiteCantBeReadByAVisitor()
    {
        $specification = new Application\Website\Specification\WebsiteIsReadable();

        $specification->isSatisfiedBy($this->website);
    }
}
