<?php
/**
 * Created by Gabriel Ślawski
 * Date: 15.11.18
 * Time: 09:13
 */

namespace app\core\session;

use stdClass;

/**
 * Class Flash
 * @package app\core\session
 */
class Flash extends Session
{
    /**
     * it contains default flash session name for flash messaging
     */
    const FLASH_SESSION_NAME = 'flash';

    /**
     * it contains default session success class
     */
    const FLASH_TYPE_SUCCESS = 'alert-success';

    /**
     * it contains default session error class
     */
    const FLASH_TYPE_DANGER = 'alert-danger';

    /**
     * @param string      $message
     * @param string|null $flashType
     * @return bool
     */
    public function message(string $message, string $flashType = null): bool
    {
        return $this->set(static::FLASH_SESSION_NAME, [
            'message' => $message,
            'type'    => $flashType ?? static::FLASH_TYPE_SUCCESS
        ]);
    }

    /**
     * @return bool
     */
    public function isExists(): bool
    {
        return $this->exists(static::FLASH_SESSION_NAME);
    }

    /**
     * @return stdClass
     */
    public function get(): stdClass
    {
        return (object)$this->getIfExists(static::FLASH_SESSION_NAME);
    }

    /**
     * @return bool
     */
    public function destroyFlash(): bool
    {
        return $this->destroy(static::FLASH_SESSION_NAME);
    }
}