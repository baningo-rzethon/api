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
trait PasswordValidator
{
    /**
     * validate password
     */
    public function passwordValidation()
    {
        if (strlen($this->data->password ?? '') < 8) {
            $this->errors[] = 'Hasło musi posiadać minimalnie 8 znaków.';
        }
    }
}