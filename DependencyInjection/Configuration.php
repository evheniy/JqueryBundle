<?php

namespace Evheniy\JqueryBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package Evheniy\JqueryBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('jquery');
        $rootNode
            ->children()
                ->scalarNode('version')->defaultValue('1.11.2')->end()
                ->scalarNode('local')->isRequired()->cannotBeEmpty()->end()
                ->booleanNode('html5')->defaultTrue()->end()
                ->booleanNode('async')->defaultFalse()->end()
            ->end();

        return $treeBuilder;
    }
}