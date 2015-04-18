<?php

namespace Evheniy\JqueryBundle\Tests\Twig;

use Evheniy\JqueryBundle\Twig\JqueryExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class JqueryExtensionTest
 *
 * @package Evheniy\JqueryBundle\Tests\Twig
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
        $this->container = new ContainerBuilder();
        $this->extension = new JqueryExtension($this->container);
    }

    /**
     * Test normal config
     */
    public function testWithId()
    {
        $this->container->setParameter('jquery', array('local' => 'test'));
        $this->assertTrue($this->container->hasParameter('jquery'));
        $jquery = $this->container->getParameter('jquery');
        $this->assertNotEmpty($jquery['local']);
        $this->assertEquals($jquery['local'], 'test');
        $globals = $this->extension->getGlobals();
        $jquery = $globals['jquery'];
        $this->assertNotEmpty($jquery['local']);
        $this->assertEquals($jquery['local'], 'test');
    }

    /**
     * Test empty config
     */
    public function testWithOutLocal()
    {
        $this->assertFalse($this->container->hasParameter('jquery'));
        $this->setExpectedException(
            'Exception',
            'You have requested a non-existent parameter "jquery".'
        );
        $this->assertEmpty($this->extension->getGlobals());
    }

    /**
     * Test getName()
     */
    public function testGetName()
    {
        $this->assertEquals($this->extension->getName(), 'jquery');
    }
} 