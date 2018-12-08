<?php
/**
 * Created by Gabriel Ślawski
 * Date: 12.11.18
 * Time: 19:35
 */

namespace app\core\http;

/**
 * Class Request
 * @package app\core\http
 */
class Request
{
    /**
     * request type post
     */
    const TYPE_POST = 'POST';

    /**
     * request type get
     */
    const TYPE_GET = 'GET';

    /**
     * @var string|null $requestMethod - contains $_SERVER['REQUEST_METHOD']
     */
    public $requestMethod = null;

    /**
     * @var $request - $_POST | $_GET request
     */
    public $request = null;

    /**
     * @return bool
     */
    public function isPostRequest(): bool
    {
        return $this->requestMethod == static::TYPE_POST;
    }

    /**
     * @param string      $controller
     * @param string|null $action
     * @param string|null $params
     */
    public function redirect(string $controller, string $action = null, string $params = null)
    {
        $location = '/' . $controller . '/';
        $location .= $action ? $action . '/' : null;
        $location .= $params ? $params . '/' : null;

        return header('Location: ' . $location);
    }

    /**
     * request sanitize - $_POST | $_GET
     */
    protected function sanitizeRequest()
    {
        $this->request = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        if ($this->isPostRequest()) {
            $this->request = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        }
    }
}