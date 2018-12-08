<?php

use app\core\Controller;
use app\models\User;
use app\models\CheckIn as CheckInModel;
use app\repositories\CommonThingPlace;

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
    public function info(string $token = null, int $checkInId = null)
    {
        if (!$token || !$user = (new User())->findByToken($token)->getFirst()) {
            return $this->redirect('checkin', 'fail');
        }

        if (!$checkInId || !$checkIn = (new CheckInModel())->find($checkInId)->getFirst()) {
            return $this->redirect('checkin', 'fail');
        }

        $thingNplaces = (new CommonThingPlace())->get($checkInId, $user->id)->getAll();

        return $this->view('checkin/info', [
            'user'         => $user,
            'checkIn'      => $checkIn,
            'thingNplaces' => $thingNplaces
        ]);
    }
}