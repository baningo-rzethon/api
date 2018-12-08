<?php
/**
 * Created by Gabriel Ślawski
 * Date: 16.11.18
 * Time: 16:37
 */

namespace app\models\forms\user;

use app\core\FormModel;
use app\core\session\Session;
use app\core\validate\LoginValidator;
use app\models\User;

/**
 * Class LoginForm
 * @package app\models\forms\user
 */
class LoginForm extends FormModel
{
    /**
     * @var string | User $user
     */
    public $user = User::class;

    /**
     * @var string | Session $session
     */
    public $session = Session::class;

    /**
     * @return array
     */
    public function validate()
    {
        return (new LoginValidator($this->data, [
            'name',
            'password',
        ]))->validate()->getErrors();
    }

    /**
     * @return User|string
     */
    public function auth()
    {
        $this->instantiateUser();
        unset($this->user->password);

        return $this->user;
    }

    /**
     * @return User|string
     */
    public function login()
    {
        $this->instantiateUser();
        unset($this->user->password);

        $this->createSession();
        if (!$this->attachUser()) {
            return false;
        }

        return $this->session->set('logged', true);
    }

    /**
     * Instantiate user object
     */
    protected function instantiateUser()
    {
        $this->user = (new $this->user)->findByName($this->data->name)->getFirst();
    }

    /**
     * Create session instance
     */
    protected function createSession()
    {
        $this->session = new $this->session;
    }

    /**
     * @return bool
     */
    protected function attachUser(): bool
    {
        return $this->session->set('user', $this->user);
    }
}