<?php
/**
 * Created by Gabriel Ślawski
 * Date: 09.11.18
 * Time: 13:05
 */

namespace app\core\http;

use app\core\http\services\UrlService;

/**
 * Class Url
 * Url format: controller/action/<params>
 *
 * @package app\core\http
 */
class Url
{
    /**
     * @var string|null $url
     */
    protected $url = null;

    /**
     * @var UrlService $urlService
     */
    protected $urlService = UrlService::class;

    /**
     * Url constructor.
     */
    public function __construct()
    {
        $this->url = $_GET['url'] ?? null;

        if ($this->url) {
            $this->url = (new $this->urlService)->sanitize($this);
        }
    }

    /**
     * @return null|string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getParametrized()
    {
        return (new $this->urlService)->parametrize($this);
    }
}