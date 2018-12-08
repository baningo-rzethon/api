<?php
/**
 * Created by Gabriel Ślawski
 * Date: 17.11.18
 * Time: 13:53
 */

use app\core\ApiController;
use app\models\forms\user\DeleteForm;
use app\models\forms\user\RegisterForm;
use app\models\forms\user\UpdateForm;
use app\models\User;

/**
 * Class Users
 * /users
 */
class Users extends ApiController
{
    /**
     * @return bool|void
     * /users
     */
    public function index()
    {
        if (!$this->onlyForAdmin()) {
            return $this->response(401, [
                'message' => 'Wystąpił nieoczekiwany błąd!'
            ]);
        }
        $users = (new User())->db->query('select * from users order by id desc')->getAll();

        return $this->response(200, $users);
    }

    /**
     * @return bool
     * /users/create
     */
    public function create()
    {
        if (!$this->onlyForAdmin()) {
            return $this->response(401, [
                'message' => 'Wystąpił nieoczekiwany błąd!'
            ]);
        }

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

    /**
     * @return bool
     * /users/update
     */
    public function update()
    {
        if (!$this->onlyForAdmin()) {
            return $this->response(401, [
                'message' => 'Wystąpił nieoczekiwany błąd!'
            ]);
        }

        $model = new UpdateForm($this->request);
        if ($this->request && !$this->errors = $model->validate()) {
            if ($model->update()) {
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

    /**
     * @return bool
     * /users/destroy
     */
    public function destroy()
    {
        if (!$this->onlyForAdmin()) {
            return $this->response(401, [
                'message' => 'Wystąpił nieoczekiwany błąd!'
            ]);
        }

        $model = new DeleteForm($this->request);
        if ($this->request && !$this->errors = $model->validate()) {
            if ($model->delete()) {
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