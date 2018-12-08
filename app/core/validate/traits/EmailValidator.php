<?php
/**
 * Created by Gabriel Ślawski
 * Date: 13.11.18
 * Time: 11:45
 */

namespace app\core\validate\traits;

/**
 * Trait EmailValidator
 * @package app\core\validate\traits
 */
trait EmailValidator
{
    /**
     * validate email address
     */
    public function emailValidation()
    {
        if (!filter_var($this->data->email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = 'To nie jest prawidłowy adres email.';
        }
    }
}