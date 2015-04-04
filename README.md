JqueryBundle
=================

This bundle provides jQuery in Symfony2 from CDN ajax.googleapis.com

Documentation
-------------

You can change jQuery version:

    jquery:
        version: 1.11.2
        local: '@AppBundle/Resources/public/js/jquery-1.11.2.min.js'

You should set jQuery local version (it helps if Google CDN doesn't work):

    jquery:
        local: '@AppBundle/Resources/public/js/jquery-1.11.2.min.js'

You can use old html version:

    jquery:
        html5: false

Default value: true. If false script will be with type="text/javascript"

You can use async loading:

    jquery:
        async: true

Default value: false. If true script will be with async="async"

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
    jquery:
        local: '@AppBundle/Resources/public/js/jquery-1.11.2.min.js'

    or

    #JqueryBundle
    jquery:
        version: 1.11.2
        local: '@AppBundle/Resources/public/js/jquery-1.11.2.min.js'
        html5: true
        async: false

And Assetic Configuration in config.yml:

    #Assetic Configuration
    assetic:
        bundles: [ JqueryBundle ]

Add this string to your layout

    {% include "JqueryBundle:Jquery:jquery.html.twig" %}

License
-------

This bundle is under the [MIT][4] license.

[MakeDev.org][1]

[Jquery][2] and [Google Hosted Libraries][3]

[1]:  http://makedev.org/articles/symfony/bundles/jquery_bundle.html
[2]:  https://jquery.com/
[3]:  https://developers.google.com/speed/libraries/devguide#jquery
[4]:  https://github.com/evheniy/JqueryBundle/blob/master/Resources/meta/LICENSE
