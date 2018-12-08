<?php

/**
 * Created by Gabriel Ślawski
 * Date: 10.11.18
 * Time: 15:45
 */

use app\core\Controller;
use app\models\User;

/**
 * Class Checkin
 */
class Checkin extends Controller
{
    /**
     * Fail page
     */
    public function fail()
    {
        $this->view('checkin/fail');
    }

    /**
     * Info page
     */
    public function info(string $token = null)
    {
        if(!$token){
            return $this->redirect('checkin', 'fail');
        }

        if (!$user = (new User())->findByToken($token)->getFirst()) {
            return $this->redirect('checkin', 'fail');
        }

        return $this->view('checkin/info');
    }
}