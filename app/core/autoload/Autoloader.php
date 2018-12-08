<?php
/**
 * Created by Gabriel Ślawski
 * Date: 10.11.18
 * Time: 14:24
 */

namespace app\core\autoload;

/**
 * Class Autoloader
 * @package app\core\autoloader
 */
class Autoloader
{
    /**
     * 1. Register auto_load
     * 2. check file existing
     * 3. if file exists - include it
     */
    public function init()
    {
        spl_autoload_register(function ($class) {
            $file = '../'.str_replace('\\', '/', $class).'.php';

            if (file_exists($file)) {
                require_once $file;

                return true;
            }
            return false;
        });
    }
}