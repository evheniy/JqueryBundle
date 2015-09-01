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
                ->scalarNode('version')->defaultValue('1.11.3')->end()
                ->scalarNode('local')->defaultValue('@JqueryBundle/Resources/public/js/jquery-1.11.3.min.js')->end()
                ->booleanNode('html5')->defaultTrue()->end()
                ->booleanNode('async')->defaultFalse()->end()
                ->scalarNode('cdn')->defaultValue('')->end()
            ->end();

        return $treeBuilder;
    }
}