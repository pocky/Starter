<?php

namespace Blackroom\AppBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class BlackroomAppExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor     = new Processor();
        $configuration = new Configuration($this->getAlias());
        $config        = $processor->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

        if (!isset($config['db_driver'])) {
            throw new \InvalidArgumentException('You must provide the blackroom_app.db_driver configuration');
        }

        try {
            $loader->load(sprintf('%s.xml', $config['db_driver']));
        } catch (\InvalidArgumentException $e) {
            throw new \InvalidArgumentException(
                sprintf('The db_driver "%s" is not supported by engine', $config['db_driver'])
            );
        }

        $container->setParameter($this->getAlias() . '.backend_type_' . $config['db_driver'], true);

        foreach (['services'] as $basename) {
            $loader->load(sprintf('%s.xml', $basename));
        }
    }

    public function getAlias()
    {
        return 'blackroom_app';
    }
}
