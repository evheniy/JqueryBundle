<?php

namespace Evheniy\JqueryBundle\Tests\Helper;

use Evheniy\JqueryBundle\Helper\CdnHelper;

/**
 * Class CdnHelperTest
 *
 * @package Evheniy\JqueryBundle\Tests\Helper
 */
class CdnHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testCreateInstance()
    {
        $this->assertInstanceOf('Evheniy\JqueryBundle\Helper\CdnHelper', CdnHelper::createInstance());
    }

    /**
     * Test filterCdn method
     */
    public function testFilterCdn()
    {
        $cdnHelper = CdnHelper::createInstance();
        $this->assertEquals($cdnHelper->filterCdn(''), '');
        $this->assertEquals($cdnHelper->filterCdn('/'), '');
        $this->assertEquals($cdnHelper->filterCdn('cdn.site.com'), '//cdn.site.com');
        $this->assertEquals($cdnHelper->filterCdn('//cdn.site.com'), '//cdn.site.com');
        $this->assertEquals($cdnHelper->filterCdn( 'http://cdn.site.com'), '//cdn.site.com');
        $this->assertEquals($cdnHelper->filterCdn('http://cdn.site.com/'), '//cdn.site.com');
        $this->assertEquals($cdnHelper->filterCdn( 'https://cdn.site.com'), '//cdn.site.com');
        $this->assertEquals($cdnHelper->filterCdn('https://cdn.site.com/'), '//cdn.site.com');
    }
}