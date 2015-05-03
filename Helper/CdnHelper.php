<?php
namespace Evheniy\JqueryBundle\Helper;

/**
 * Class CdnHelper
 *
 * @package Evheniy\JqueryBundle\Helper
 */
class CdnHelper
{
    /**
     * @return CdnHelper
     */
    public static function createInstance()
    {
        return new self;
    }

    /**
     * @param string $cdn
     *
     * @return string
     */
    public function filterCdn($cdn = '')
    {
        if (!empty($cdn) && $cdn != '/') {
            $url = parse_url($cdn);
            if (!empty($url['host'])) {
                $cdn = $url['host'];
            } else {
                $cdn = current(
                    array_filter(preg_split('/[^a-z0-9\.]+/', $url['path']))
                );
            }
            $cdn = '//' . $cdn;
        } else {
            $cdn = '';
        }

        return $cdn;
    }
}