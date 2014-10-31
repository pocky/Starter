<?php

namespace Blackroom\AppBundle;

use Blackroom\AppBundle\DependencyInjection\BlackroomAppExtension;
use Doctrine\Bundle\MongoDBBundle\DependencyInjection\Compiler\DoctrineMongoDBMappingsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\Console\Application;

class BlackroomAppBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new BlackroomAppExtension();
    }

    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $mappings = array(
            realpath($this->getPath().'/Resources/config/doctrine/model') => 'Domain\Model',
        );

        $ormCompilerClass = 'Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass';

        if (class_exists($ormCompilerClass)) {
            $container->addCompilerPass(
                DoctrineOrmMappingsPass::createXmlMappingDriver(
                    $mappings,
                    [],
                    'blackroom_app.backend_type_orm'
                ));
        }

        $mongoCompilerClass = 'Doctrine\Bundle\MongoDBBundle\DependencyInjection\Compiler\DoctrineMongoDBMappingsPass';

        if (class_exists($mongoCompilerClass)) {
            $container->addCompilerPass(
                DoctrineMongoDBMappingsPass::createXmlMappingDriver(
                    $mappings,
                    [],
                    'blackroom_app.backend_type_mongodb'
                ));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function registerCommands(Application $application)
    {
        if (!is_dir($dir = $this->getPath().'/Command')) {
            return;
        }

        $finder = new Finder();
        $finder->files()->name('*Command.php')->in($dir);

        $prefix = $this->getNamespace().'\\Command';
        foreach ($finder as $file) {
            $ns = $prefix;

            if ($relativePath = $file->getRelativePath()) {
                $ns .= '\\'.strtr($relativePath, '/', '\\');
            }

            $class = $ns.'\\'.$file->getBasename('.php');

            if ($this->container) {
                $alias = 'console.command.'.strtolower(str_replace('\\', '_', $class));

                if ($this->container->has($alias)) {
                    continue;
                }
            }

            $r = new \ReflectionClass($class);

            if ($r->isSubclassOf('Symfony\\Component\\Console\\Command\\Command') &&
                !$r->isAbstract() && !$r->getConstructor()->getNumberOfRequiredParameters()) {
                    $application->add($r->newInstance());
                }
        }
    }
}
