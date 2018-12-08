<?php
/**
 * Created by Gabriel Ślawski
 * Date: 09.11.18
 * Time: 13:04
 */

namespace app\core\http\services;

use app\core\http\Url;

/**
 * Class UrlHelper
 * @package app\core\http\services
 */
class UrlService
{
    /**
     * @param Url $url
     * @return Url|mixed|string
     */
    public function sanitize(Url $url)
    {
        $url = rtrim($url->getUrl(), '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);

        return $url;
    }

    /**
     * @param Url $url
     * @return array
     */
    public function parametrize(Url $url)
    {
        return explode('/', $url->getUrl());
    }
}