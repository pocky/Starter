<?php

namespace Black\Bundle\WebsiteBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @var
     */
    private $alias;

    /**
     * @param $alias
     */
    public function __construct($alias)
    {
        $this->alias = $alias;
    }

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root($this->alias);

        $supportedDrivers = ['orm', 'yaml'];
        $rootNode
            ->children()

                ->scalarNode('db_driver')
                    ->validate()
                        ->ifNotInArray($supportedDrivers)
                        ->thenInvalid('The database driver %s is not supported. Please choose one of ' . json_encode($supportedDrivers))
                    ->end()
                ->isRequired()
                ->cannotBeOverwritten()
                ->cannotBeEmpty()
                ->end()

                ->scalarNode('website_class')->isRequired()->cannotBeEmpty()->end()

            ->end();

        return $treeBuilder;
    }
}
