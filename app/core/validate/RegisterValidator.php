<?php
/**
 * Created by Gabriel Ślawski
 * Date: 13.11.18
 * Time: 11:24
 */

namespace app\core\validate;

use app\core\validate\traits\EmailValidator;
use app\core\validate\traits\EmptyValidator;
use app\core\validate\traits\PasswordValidator;
use app\core\validate\traits\StringValidator;
use app\models\User;

/**
 * Class RegisterValidator
 * @package app\core\validate
 */
class RegisterValidator extends AbstractValidator implements Validatable
{
    use EmailValidator, PasswordValidator, StringValidator, EmptyValidator;

    /**
     * validate name confirmation
     */
    public function name()
    {
        if (!$this->notEmpty()) {
            return;
        }
        if ((new User())->findByName($this->data->name)->count() != 0) {
            $this->errors[] = 'Nazwa jest już zajęta.';
        }
        $this->stringValidation(3, 25);
    }

    /**
     * validate password confirmation
     */
    public function confirm()
    {
        if (!$this->notEmpty()) {
            return;
        }
        if ($this->data->password != $this->data->confirm) {
            $this->errors[] = 'Hasła nie są identyczne.';
        }
    }

    /**
     * validate email address
     */
    public function email()
    {
        if (!$this->notEmpty()) {
            return;
        }
        if ((new User())->findByEmail($this->data->email)->count() != 0) {
            $this->errors[] = 'Email zajęty.';
        }
        $this->emailValidation();
    }

    /**
     * validate password
     */
    public function password()
    {
        if (!$this->notEmpty()) {
            return;
        }
        $this->passwordValidation();
    }
}