<?php
/**
 * Created by Gabriel Ślawski
 * Date: 16.11.18
 * Time: 17:11
 */

namespace app\core;

use app\core\session\Session;
use app\models\Role;

/**
 * Class Auth
 * @package app\core
 */
class Auth
{
    /**
     * @var string | Session $session
     */
    public $session = Session::class;

    /**
     * @var string | Role $role
     */
    public $role = Role::class;

    /**
     * Auth constructor.
     */
    public function __construct()
    {
        $this->session = new $this->session;
        $this->role = new $this->role;
    }

    /**
     * @return bool
     */
    public function isLogged(): bool
    {
        return $this->session->getIfExists('user') ? true : false;
    }

    /**
     * @return string
     */
    public function who(): string
    {
        if (!$user = $this->session->getIfExists('user')) {
            return Role::GUEST;
        }

        return $this->role->getRoleName($user->role_id)->getFirst()->name;
    }

    /**
     * @return array|null
     */
    public function user()
    {
        if (!$this->session->getIfExists('user')) {
            return null;
        }

        return $this->session->getIfExists('user');
    }

    /**
     * @return bool
     */
    public function logout(): bool
    {
        if (!$this->isLogged()) {
            return false;
        }

        if (!$this->session->destroy('user') || !$this->session->destroy('logged')) {
            return false;
        }

        return true;
    }
}