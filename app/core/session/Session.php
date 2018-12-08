<?php
/**
 * Created by Gabriel Ślawski
 * Date: 15.11.18
 * Time: 09:14
 */

namespace app\core\session;

use Exception;

/**
 * Class Session
 * @package app\core\session
 */
class Session
{
    /**
     * @param string $name
     * @param null   $value
     * @return bool
     */
    public function set(string $name, $value = null): bool
    {
        if (!$_SESSION[$name] = $value) {
            return false;
        }

        return true;
    }

    /**
     * @param string $name
     * @return null | array
     */
    public function getIfExists(string $name)
    {
        if (!$this->exists($name)) {
            return [];
        }

        return $_SESSION[$name];
    }

    /**
     * @param string $name
     * @return bool
     */
    public function exists(string $name)
    {
        return isset($_SESSION[$name]);
    }

    /**
     * @param string $name
     * @return bool
     */
    public function destroy(string $name): bool
    {
        try {
            unset($_SESSION[$name]);

            return true;
        } catch (Exception $e) {

            return false;
        }
    }
}