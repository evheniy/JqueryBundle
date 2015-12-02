JqueryBundle
=================

[![knpbundles.com](http://knpbundles.com/evheniy/JqueryBundle/badge)](http://knpbundles.com/evheniy/JqueryBundle)

[![Latest Stable Version](https://poser.pugx.org/evheniy/jquery-bundle/v/stable.svg)](https://packagist.org/packages/evheniy/jquery-bundle) [![Total Downloads](https://poser.pugx.org/evheniy/jquery-bundle/downloads.svg)](https://packagist.org/packages/evheniy/jquery-bundle) [![Latest Unstable Version](https://poser.pugx.org/evheniy/jquery-bundle/v/unstable.svg)](https://packagist.org/packages/evheniy/jquery-bundle) [![License](https://poser.pugx.org/evheniy/jquery-bundle/license.svg)](https://packagist.org/packages/evheniy/jquery-bundle)

[![Build Status](https://travis-ci.org/evheniy/JqueryBundle.svg?branch=master)](https://travis-ci.org/evheniy/JqueryBundle)
[![Coverage Status](https://coveralls.io/repos/evheniy/JqueryBundle/badge.svg?branch=master&service=github)](https://coveralls.io/github/evheniy/JqueryBundle?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/evheniy/JqueryBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/evheniy/JqueryBundle/?branch=master) [![Build Status](https://scrutinizer-ci.com/g/evheniy/JqueryBundle/badges/build.png?b=master)](https://scrutinizer-ci.com/g/evheniy/JqueryBundle/build-status/master)

This bundle provides jQuery in Symfony2 from CDN ajax.googleapis.com

Documentation
-------------

You can change jQuery version:

    jquery:
        version: 1.11.3
        
Default value: 1.11.3

You can set jQuery local version (it helps if Google CDN doesn't work):

    jquery:
        local: '@AppBundle/Resources/public/js/jquery-1.11.3.min.js'
        
Default value: '@JqueryBundle/Resources/public/js/jquery-1.11.3.min.js'

You can use old html version:

    jquery:
        html5: false

Default value: true. If false script will be with type="text/javascript"

You can use async loading:

    jquery:
        async: true

Default value: false. If true script will be with async="async"

You can use local CDN (domain):

    jquery:
        cdn: cdn.site.com

Default value is empty

Installation
------------

    $ composer require evheniy/jquery-bundle "1.*"

Or add to composer.json

    "evheniy/jquery-bundle": "1.*"

AppKernel:

    public function registerBundles()
        {
            $bundles = array(
                ...
                new Evheniy\JqueryBundle\JqueryBundle(),
            );
            ...

config.yml:

    #JqueryBundle
    jquery: ~

    or

    #JqueryBundle
    jquery:
        version: 1.11.3
        local: '@AppBundle/Resources/public/js/jquery-1.11.3.min.js'
        html5: true
        async: false
        cdn: cdn.site.com

And Assetic Configuration in config.yml:

    #Assetic Configuration
    assetic:
        bundles: [ JqueryBundle ]

Add this string to your layout

    {% include "JqueryBundle:Jquery:jquery.html.twig" %}

The last step

    app/console assetic:dump --env=prod --no-debug

License
-------

This bundle is under the [MIT][4] license.

[Документация на русском языке][1]

[Jquery][2] and [Google Hosted Libraries][3]

[1]:  http://makedev.org/articles/symfony/bundles/jquery_bundle.html
[2]:  https://jquery.com/
[3]:  https://developers.google.com/speed/libraries/devguide#jquery
[4]:  https://github.com/evheniy/JqueryBundle/blob/master/Resources/meta/LICENSE
