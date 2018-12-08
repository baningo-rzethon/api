<?php
/**
 * Created by Gabriel Ślawski
 * Date: 12.11.18
 * Time: 19:31
 */

use app\core\ApiController;
use app\core\libs\JWT\JWT;
use app\models\forms\user\LoginForm;
use app\models\forms\user\RegisterForm;

/**
 * Class Oauth
 * /oauth
 */
class Oauth extends ApiController
{
    /**
     * @return bool
     */
    public function login()
    {
        $model = new LoginForm($this->request);

        if ($this->request && !$this->errors = $model->validate()) {
            if ($user = $model->auth()) {
                return $this->response(200, [
                    'message' => 'Zalogowano pomyślnie!',
                    "jwt"     => JWT::encode([
                        "data" => $user
                    ], API_KEY)
                ]);
            }

            return $this->response(400, [
                'message' => 'Wystąpił nieoczekiwany problem!'
            ]);
        }

        return $this->response(400, [
            'message' => $this->errors
        ]);
    }

    /**
     * @return bool
     * /users/create
     */
    public function register()
    {
        $model = new RegisterForm($this->request);
        if ($this->request && !$this->errors = $model->validate()) {
            if ($model->register()) {
                return $this->response(200, [
                    'message' => 'Sukces!'
                ]);
            }

            return $this->response(400, [
                'message' => 'Wystąpił nieoczekiwany błąd!'
            ]);
        }

        return $this->response(202, $this->errors);
    }
}