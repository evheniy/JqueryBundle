<?php

namespace Evheniy\JqueryBundle\Tests\DependencyInjection;

use Evheniy\JqueryBundle\DependencyInjection\Configuration;

/**
 * Class ConfigurationTest
 *
 * @package Evheniy\JqueryBundle\Tests\DependencyInjection
 */
class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test getConfigTreeBuilder()
     */
    public function testGetConfigTreeBuilder()
    {
        $configuration = new Configuration();
        $tree = $configuration->getConfigTreeBuilder();
        $this->assertInstanceOf(
            'Symfony\Component\Config\Definition\Builder\TreeBuilder',
            $tree
        );
        $this->assertInstanceOf(
            'Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition',
            $tree->root('jquery')
        );
        $tree = $tree->buildTree();
        $this->assertEquals('jquery', $tree->getName());
        $this->assertFalse($tree->hasDefaultValue());
        $this->assertFalse($tree->isRequired());
    }
} 