<?php
/**
 * Created by Gabriel Ślawski
 * Date: 30.11.18
 * Time: 16:36
 */

namespace app\models\forms\user;

use app\core\FormModel;
use app\validators\user\UpdateUserValidator;
use app\models\User;

/**
 * Class UpdateForm
 * @package app\models\forms\user
 */
class UpdateForm extends FormModel
{
    /**
     * @var string | User $user
     */
    public $user = User::class;

    /**
     * @return array
     */
    public function validate(): array
    {
        return (new UpdateUserValidator($this->data, [
            'id',
            'name',
            'password',
            'confirm'
        ]))->validate()->getErrors();
    }

    /**
     * @return mixed
     */
    public function update()
    {
        $this->user = new $this->user;

        $this->user->db
            ->query('update users set name = :name, email = :email where id = :id')
            ->bind(':name', $this->data->name)
            ->bind(':email', $this->data->email ?? null)
            ->bind(':id', $this->data->id)
            ->execute();

        if ($this->data->password) {
            $this->user->db
                ->query('update users set password = :password where id = :id')
                ->bind(':id', $this->data->id)
                ->bind(':password', password_hash($this->data->password, PASSWORD_DEFAULT))
                ->execute();
        }

        return true;
    }
}