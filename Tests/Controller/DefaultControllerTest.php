<?php
namespace Evheniy\JqueryBundle\Tests\Controller;

use Assetic\Extension\Twig\AsseticExtension;
use Assetic\Factory\AssetFactory;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Evheniy\JqueryBundle\Twig\JqueryExtension;
use Evheniy\JqueryBundle\DependencyInjection\JqueryExtension as JqueryExtensionDI;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class DefaultControllerTest
 *
 * @package Evheniy\JqueryBundle\Tests\Controller
 */
class DefaultControllerTest extends WebTestCase
{
    /**
     *
     */
    protected function getTwig(array $data)
    {
        $twig = new \Twig_Environment(
            new \Twig_Loader_Array(
                array('JqueryBundle:Jquery:jquery.html.twig' => file_get_contents(dirname(__FILE__) . '/../../Resources/views/Jquery/jquery.html.twig'))
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
        $this->assertRegExp('/src=\"\/\/cdn\.site\.comjs\/jquery-1.11.3.min.js\"/', $this->getTwig(array(array('cdn' => 'cdn.site.com')))->render('JqueryBundle:Jquery:jquery.html.twig'));
    }

    /**
     *
     */
    public function testWithOutCdn()
    {
        $this->assertRegExp('/src=\"js\/jquery-1.11.3.min\.js\"/', $this->getTwig(array(array()))->render('JqueryBundle:Jquery:jquery.html.twig'));
    }

    /**
     *
     */
    public function testFileCDN()
    {
        $client = static::createClient();
        $jquery = $client->getContainer()->getParameter('jquery');
        $headers = get_headers('http://ajax.googleapis.com/ajax/libs/jquery/' . $jquery['version'] . '/jquery.min.js');
        $this->assertTrue(strpos($headers[0], '200') !== false);
        $headers = get_headers('https://ajax.googleapis.com/ajax/libs/jquery/' . $jquery['version'] . '/jquery.min.js');
        $this->assertTrue(strpos($headers[0], '200') !== false);
    }
}