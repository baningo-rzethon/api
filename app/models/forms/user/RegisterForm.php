<?php
/**
 * Created by Gabriel Ślawski
 * Date: 13.11.18
 * Time: 18:28
 */

namespace app\models\forms\user;

use app\core\FormModel;
use app\core\validate\RegisterValidator;
use app\models\User;

/**
 * Class RegisterForm
 * @package app\models\forms\user
 */
class RegisterForm extends FormModel
{
    /**
     * @var string | User $user
     */
    public $user = User::class;

    /**
     * @return array
     */
    public function validate()
    {
        return (new RegisterValidator($this->data, [
            'name',
            'password',
            'confirm',
            'email'
        ]))->validate()->getErrors();
    }

    /**
     * @return mixed
     */
    public function register()
    {
        $this->user = new $this->user;

        return $this->user->db
            ->query('insert into users(name, email, password) values(:name, :email, :password)')
            ->bind(':name', $this->data->name)
            ->bind(':email', $this->data->email ?? null)
            ->bind(':password', password_hash($this->data->password, PASSWORD_DEFAULT))
            ->execute();
    }
}