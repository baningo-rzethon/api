<?php
/**
 * Created by Gabriel Ślawski
 * Date: 13.11.18
 * Time: 11:24
 */

namespace app\validators\user;

use app\core\validate\AbstractValidator;
use app\core\validate\traits\EmptyValidator;
use app\core\validate\Validatable;
use app\models\User;
use stdClass;

/**
 * Class DeleteUserValidator
 * @package app\validators\user
 */
class DeleteUserValidator extends AbstractValidator implements Validatable
{
    use EmptyValidator;

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
}