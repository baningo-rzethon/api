<?php
/**
 * Created by Gabriel Ślawski
 * Date: 12.11.18
 * Time: 19:31
 */

use app\core\Controller;
use app\core\session\Flash;
use app\models\forms\LoginForm;
use app\models\forms\RegisterForm;
use app\models\User;

/**
 * Class Auth - users controller
 * /auth
 */
class Auth extends Controller
{
    /**
     * action register
     * /auth/register
     */
    public function register()
    {
        $model = new RegisterForm($this->request);

        if ($this->isPostRequest() && !$this->errors = $model->validate()) {
            if (!$model->register()) {
                (new Flash())->message('An error has been occurred!', Flash::FLASH_TYPE_DANGER);

                return $this->redirect('auth', 'register');
            }

            (new Flash())->message('Registration process succeeded!');

            return $this->redirect('auth', 'login');
        }

        return $this->view('auth/register', (array)$this->request ?? []);
    }

    /**
     * action login
     * /auth/login
     */
    public function login()
    {
        if ($this->auth->isLogged()) {
            (new Flash())->message('An error has been occurred!');

            return $this->redirect('pages');
        }

        $model = new LoginForm($this->request);
        $model->user = new User();

        if ($this->isPostRequest() && !$this->errors = $model->validate()) {
            if (!$model->login()) {
                (new Flash())->message('An error has been occurred!', Flash::FLASH_TYPE_DANGER);

                return $this->redirect('auth', 'login');
            }

            (new Flash())->message('You have been logged!');

            return $this->redirect('dashboard');
        }

        return $this->view('auth/login', (array)$this->request ?? []);
    }

    /**
     * action logout
     * /auth/logout
     */
    public function logout()
    {
        if (!$this->auth->logout()) {
            (new Flash())->message('An error has been occurred!', Flash::FLASH_TYPE_DANGER);

            return $this->redirect('pages');
        }

        (new Flash())->message('Logged out successfully!');

        return $this->redirect('pages');
    }
}