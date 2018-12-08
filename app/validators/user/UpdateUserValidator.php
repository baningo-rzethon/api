<?php
/**
 * Created by Gabriel Ślawski
 * Date: 13.11.18
 * Time: 11:24
 */

namespace app\validators\user;

use app\core\validate\AbstractValidator;
use app\core\validate\traits\EmailValidator;
use app\core\validate\traits\EmptyValidator;
use app\core\validate\traits\PasswordValidator;
use app\core\validate\traits\StringValidator;
use app\core\validate\Validatable;
use app\models\Role;
use app\models\User;
use stdClass;

/**
 * Class UpdateUserValidator
 * @package app\validators\user
 */
class UpdateUserValidator extends AbstractValidator implements Validatable
{
    use EmailValidator, PasswordValidator, StringValidator, EmptyValidator;

    /**
     * @var string | User $user
     */
    protected $user = User::class;

    /**
     * UpdateUserValidator constructor.
     * @param stdClass $data
     * @param array    $requirements
     */
    public function __construct(stdClass $data, array $requirements)
    {
        parent::__construct($data, $requirements);
        $this->user = new $this->user;
    }

    /**
     * validate user existing
     */
    public function id()
    {
        if (!$this->notEmpty()) {
            return;
        }
        if ($this->user->find($this->data->id)->count() != 1) {
            $this->errors[] = 'Wystąpił nieoczekiwany błąd!';
        }
    }

    /**
     * validate role existing
     */
    public function role_id()
    {
        if (!$this->notEmpty()) {
            return;
        }
        if ((new Role())->getRoleName($this->data->role_id)->count() != 0) {
            $this->errors[] = 'Wystąpił nieoczekiwany błąd!';
        }
    }

    /**
     * validate name confirmation
     */
    public function name()
    {
        if (!$this->notEmpty()) {
            return;
        }
        $user = $this->user->findByName($this->data->name);
        if ($user->count() > 0 && $user->getFirst()->name != $this->data->name) {
            $this->errors[] = 'Nazwa jest już zajęta.';
        }
        $this->stringValidation(3, 25);
    }

    /**
     * validate password confirmation
     */
    public function confirm()
    {
        if ($this->data->password != $this->data->confirm) {
            $this->errors[] = 'Hasła nie są identyczne.';
        }
    }

    /**
     * validate email address
     */
    public function email()
    {
        if ($this->user->findByEmail($this->data->email)->count() != 0) {
            $this->errors[] = 'Email zajęty.';
        }
        $this->emailValidation();
    }

    /**
     * validate password
     */
    public function password()
    {
        if($this->data->password){
            $this->passwordValidation();
        }

    }
}