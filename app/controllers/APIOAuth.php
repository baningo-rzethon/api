<?php
/**
 * Created by Gabriel Ślawski
 * Date: 12.11.18
 * Time: 19:31
 */

use app\core\ApiController;
use app\core\libs\JWT\JWT;
use app\models\forms\user\LoginForm;

/**
 * Class Oauth
 * /oauth
 */
class APIOAuth extends ApiController
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
}