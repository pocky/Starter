<?php

/**
 * Defines application features from the specific context.
 */
class WebsiteContext extends DomainContext
{
    /**
     * @var \Black\Website\Infrastructure\Persistence\InMemoryRepository
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
        $class = 'Black\Website\Domain\Entity\Website';

        //$this->repository = new \Black\Website\Infrastructure\Persistence\InMemoryRepository();
        $this->repository = new \Black\Website\Infrastructure\Persistence\YamlRepository(\org\bovigo\vfs\vfsStream::url('cache/website.yml'), $class);
        $this->dispatcher = new \Symfony\Component\HttpKernel\Tests\Fixtures\TestEventDispatcher();
    }

    /**
     * @Given I don't have any website
     */
    public function iDontHaveAnyWebsite()
    {
        $websiteRepository = new \Black\Website\Infrastructure\Persistence\CQRS\ReadRepository($this->repository);
        $service = new \Black\Website\Infrastructure\Service\ReadService($websiteRepository);
        $service->listWebsites();
    }

    /**
     * @When I create my website with a :name, a :description and an :author
     */
    public function iWantToCreateAWebsiteWithANameADescriptionAndAnAuthor($name, $description, $author)
    {
        $websiteRepository = new \Black\Website\Infrastructure\Persistence\CQRS\WriteRepository($this->repository);
        $service = new \Black\Website\Infrastructure\Service\WriteService($websiteRepository);

        $dto = new \Black\Website\Application\DTO\CreateWebsiteDTO($name, $description, $author);
        $author = new \Black\Website\Domain\ValueObject\Author($dto->getAuthor());

        $command = new \Black\Website\Infrastructure\CQRS\Command\CreateWebsiteCommand($dto->getName(), $dto->getDescription(), $author);
        $handler = new \Black\Website\Infrastructure\CQRS\Handler\CreateWebsiteHandler($service, $this->repository, $this->dispatcher);
        $handler->handle($command);
    }

    /**
     * @Then I must have a website with id :identifier
     */
    public function iMustHaveAWebsiteWithId($identifier)
    {
        $websiteId = new \Black\Website\Domain\ValueObject\WebsiteId($identifier);

        $websiteRepository = new \Black\Website\Infrastructure\Persistence\CQRS\ReadRepository($this->repository);
        $service = new \Black\Website\Infrastructure\Service\ReadService($websiteRepository);
        $website = $service->find($websiteId);
    }

    /**
     * @Given I have a website
     */
    public function iHaveAWebsite()
    {
        $websiteId = new \Black\Website\Domain\ValueObject\WebsiteId(1234);
        $author = new \Black\Website\Domain\ValueObject\Author("John Doe");
        $this->website = new \Black\Website\Domain\Entity\Website($websiteId, "name2", "description", $author);

        $websiteRepository = new \Black\Website\Infrastructure\Persistence\CQRS\WriteRepository($this->repository);
        $this->service = new \Black\Website\Infrastructure\Service\WriteService($websiteRepository);
        $this->service->createWebsite($this->website);
    }

    /**
     * @When I enable my website
     */
    public function iEnableMyWebsite()
    {
        $dto = new \Black\Website\Application\DTO\ActiveWebsiteDTO(1234);
        $id = new \Black\Website\Domain\ValueObject\WebsiteId($dto->getId());
        $repository = new \Black\Website\Infrastructure\Persistence\CQRS\ReadRepository($this->repository);
        $this->website = $repository->find($id);

        $command = new \Black\Website\Infrastructure\CQRS\Command\ActiveWebsiteCommand($this->website);
        $handler = new \Black\Website\Infrastructure\CQRS\Handler\ActiveWebsiteHandler($this->service, $this->dispatcher);
        $handler->handle($command);
    }

    /**
     * @Given my website can be read by a visitor
     */
    public function myWebsiteCanBeReadByAVisitor()
    {
        $specification = new \Black\Website\Application\Specification\WebsiteIsReadable();

        if ($specification->isSatisfiedBy($this->website)) {
            $this->website;
        }
    }

    /**
     * @When I disable my website
     */
    public function iDisableMyWebsite()
    {
        $dto = new \Black\Website\Application\DTO\ActiveWebsiteDTO(1234);
        $id = new \Black\Website\Domain\ValueObject\WebsiteId($dto->getId());
        $repository = new \Black\Website\Infrastructure\Persistence\CQRS\ReadRepository($this->repository);
        $this->website = $repository->find($id);

        $command = new \Black\Website\Infrastructure\CQRS\Command\DisableWebsiteCommand($this->website);
        $handler = new \Black\Website\Infrastructure\CQRS\Handler\DisableWebsiteHandler($this->service, $this->dispatcher);
        $handler->handle($command);
    }

    /**
     * @Given my website can't be read by a visitor
     */
    public function myWebsiteCantBeReadByAVisitor()
    {
        $specification = new \Black\Website\Application\Specification\WebsiteIsReadable();

        $specification->isSatisfiedBy($this->website);
    }

    /**
     * @When I update his name with :name
     */
    public function iUpdateHisNameWith($name)
    {
        $dto = new \Black\Website\Application\DTO\WebsiteDTO(1234, $name, "description", "John Doe");

        $id = new \Black\Website\Domain\ValueObject\WebsiteId($dto->getId());
        $author = new \Black\Website\Domain\ValueObject\Author($dto->getAuthor());

        $repository = new \Black\Website\Infrastructure\Persistence\CQRS\ReadRepository($this->repository);
        $this->website = $repository->find($id);

        $command = new \Black\Website\Infrastructure\CQRS\Command\UpdateWebsiteCommand($dto->getName(), $dto->getDescription(), $author, $this->website);
        $handler = new \Black\Website\Infrastructure\CQRS\Handler\UpdateWebsiteHandler($this->service, $this->dispatcher);
        $handler->handle($command);
    }
}
