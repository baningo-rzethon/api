<?php
/**
 * Created by Gabriel Ślawski
 * Date: 13.11.18
 * Time: 11:24
 */

namespace app\core\validate;

use app\core\validate\traits\EmptyValidator;
use app\core\validate\traits\PasswordValidator;
use app\core\validate\traits\StringValidator;
use app\models\User;

/**
 * Class LoginValidator
 * @package app\core\validate
 */
class LoginValidator extends AbstractValidator implements Validatable
{
    use StringValidator, PasswordValidator, EmptyValidator;

    /**
     * validate name confirmation
     */
    public function name()
    {
        if (!$this->notEmpty()) {
            return;
        }
        $this->stringValidation(3, 25);
        if (!(new User())->findByName($this->data->name ?? '')->getFirst()) {
            $this->errors[] = 'Błędna nazwa użytkownika.';
        }
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
        $user = (new User())->findByName($this->data->name ?? '')->getFirst();

        if (!$user) {
            return;
        }

        if (!password_verify($this->data->password ?? '', $user->password)) {
            $this->errors[] = 'Niepoprawne hasło.';
        }
    }
}