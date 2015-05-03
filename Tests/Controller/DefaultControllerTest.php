<?php
namespace Evheniy\JqueryBundle\Tests\Controller;

use Assetic\Extension\Twig\AsseticExtension;
use Assetic\Factory\AssetFactory;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Evheniy\JqueryBundle\Twig\JqueryExtension;
use Evheniy\JqueryBundle\DependencyInjection\JqueryExtension as JqueryExtensionDI;

/**
 * Class DefaultControllerTest
 *
 * @package Evheniy\JqueryBundle\Tests\Controller
 */
class DefaultControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    protected function getTwig(array $data)
    {
        $twig = new \Twig_Environment(
            new \Twig_Loader_Array(
                array('JqueryBundle::jquery.html.twig' => file_get_contents(dirname(__FILE__) . '/../../Resources/views/jquery.html.twig'))
            )
        );
        $container = new ContainerBuilder();
        $extension = new JqueryExtensionDI();
        $extension->load($data, $container);
        $twig ->addExtension(new AsseticExtension(new AssetFactory(dirname(__FILE__) . '/')));
        $twig ->addExtension(new JqueryExtension($container));

        return $twig;
    }

    /**
     *
     */
    public function testWithCdn()
    {
        $this->assertRegExp('/src=\"\/\/cdn\.site\.comjs\/29ad352\.js\"/', $this->getTwig(array(array('cdn' => 'cdn.site.com')))->render('JqueryBundle::jquery.html.twig'));
    }

    /**
     *
     */
    public function testWithOutCdn()
    {
        $this->assertRegExp('/src=\"js\/29ad352\.js\"/', $this->getTwig(array(array()))->render('JqueryBundle::jquery.html.twig'));
    }
}