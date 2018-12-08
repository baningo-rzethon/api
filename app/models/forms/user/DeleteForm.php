<?php
/**
 * Created by Gabriel Ślawski
 * Date: 01.12.18
 * Time: 22:30
 */

namespace app\models\forms\user;

use app\core\FormModel;
use app\models\User;
use app\validators\user\DeleteUserValidator;

/**
 * Class DeleteForm
 * @package app\models\forms\user
 */
class DeleteForm extends FormModel
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
        return (new DeleteUserValidator($this->data, [
            'id',
        ]))->validate()->getErrors();
    }

    /**
     * @return mixed
     */
    public function delete()
    {
        $this->user = new $this->user;

        return $this->user->db
            ->query('delete from users where id = :id')
            ->bind(':id', $this->data->id)
            ->execute();
    }
}