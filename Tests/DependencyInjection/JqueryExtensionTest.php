<?php

namespace Evheniy\JqueryBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Evheniy\JqueryBundle\DependencyInjection\JqueryExtension;

/**
 * Class JqueryExtensionTest
 *
 * @package Evheniy\JqueryBundle\Tests\DependencyInjection
 */
class JqueryExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var JqueryExtension
     */
    private $extension;
    /**
     * @var ContainerBuilder
     */
    private $container;

    /**
     *
     */
    protected function setUp()
    {
        $this->extension = new JqueryExtension();

        $this->container = new ContainerBuilder();
        $this->container->registerExtension($this->extension);
    }

    /**
     * @param ContainerBuilder $container
     * @param string           $resource
     */
    protected function loadConfiguration(ContainerBuilder $container, $resource)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/Fixtures/'));
        $loader->load($resource . '.yml');
    }

    /**
     * Test empty config
     */
    public function testWithoutConfiguration()
    {
        $this->container->loadFromExtension($this->extension->getAlias());
        $this->container->compile();
        $this->assertTrue($this->container->hasParameter('jquery'));
        $jquery = $this->container->getParameter('jquery');
        $this->assertNotEmpty($jquery['local']);
        $this->assertEquals($jquery['local'], '@JqueryBundle/Resources/public/js/jquery-1.11.3.min.js');
    }

    /**
     * Test normal config
     */
    public function testWithLocal()
    {
        $this->loadConfiguration($this->container, 'withLocal');
        $this->container->compile();

        $this->assertTrue($this->container->hasParameter('jquery'));
        $jquery = $this->container->getParameter('jquery');
        $this->assertNotEmpty($jquery['local']);
        $this->assertEquals($jquery['local'], 'jquery-1.11.3.min.js');
        $this->assertTrue($this->container->hasParameter('jquery.local'));
        $this->assertEquals($this->container->getParameter('jquery.local'), 'jquery-1.11.3.min.js');
    }

    /**
     * Test normal config
     */
    public function testTest()
    {
        $this->loadConfiguration($this->container, 'test');
        $this->container->compile();

        $this->assertTrue($this->container->hasParameter('jquery'));
        $this->assertTrue($this->container->hasParameter('jquery.local'));
        $jquery = $this->container->getParameter('jquery');
        $this->assertNotEmpty($jquery['local']);
        $this->assertEquals($jquery['local'], 'jquery-1.11.0.min.js');
        $this->assertEquals($this->container->getParameter('jquery.local'), 'jquery-1.11.0.min.js');
        $this->assertFalse($jquery['html5']);
        $this->assertTrue($jquery['async']);
        $this->assertNotEmpty($jquery['cdn']);
        $this->assertEquals($jquery['cdn'], '//cdn.site.com');
    }

    /**
     * Test wrong config
     */
    public function testWithOutLocal()
    {
        $this->loadConfiguration($this->container, 'withOutLocal');
        $this->container->compile();
        $this->assertTrue($this->container->hasParameter('jquery'));
        $jquery = $this->container->getParameter('jquery');
        $this->assertNotEmpty($jquery['local']);
        $this->assertEquals($jquery['local'], '@JqueryBundle/Resources/public/js/jquery-1.11.3.min.js');
        $this->assertEmpty($jquery['cdn']);
        $this->assertEquals($jquery['cdn'], '');
    }
}
