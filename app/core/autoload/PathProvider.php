<?php
/**
 * Created by Gabriel Ślawski
 * Date: 10.11.18
 * Time: 16:16
 */

namespace app\core\autoload;

/**
 * Class PathProvider
 * @package app\core\autoload
 */
class PathProvider
{
    /**
     * @param string $controllerName
     * @return string
     */
    public function controller(string $controllerName)
    {
        return APP_PATH . '/controllers/' . $controllerName . '.php';
    }

    /**
     * @param string $viewName
     * @return string
     */
    public function view(string $viewName)
    {
        return APP_PATH . '/views/' . $viewName . '.php';
    }

    /**
     * @param string $name
     * @return string
     */
    public function css(string $name)
    {
        return PUBLIC_PATH . '/css/' . $name . '.css';
    }

    /**
     * @param string $name
     * @return string
     */
    public function script(string $name)
    {
        return PUBLIC_PATH . '/js/' . $name . '.js';
    }

    /**
     * @param string $name
     * @return string
     */
    public function img(string $name)
    {
        return PUBLIC_PATH . '/img/' . $name;
    }
}