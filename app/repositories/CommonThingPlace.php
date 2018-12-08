<?php

namespace app\repositories;

use app\core\Database;

class CommonThingPlace
{
    /**
     * @var Database $db
     */
    public $db;

    /**
     * Model constructor.
     * Instantiate db
     */
    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * @param int $checkInId
     * @param int $userId
     * @return Database
     */
    public function get(int $checkInId, int $userId)
    {
        return $this->db->query('select distinct t.id thing, p.id place 
          from things t, `check-ins_places` cp, places p, places_things pt, users u, `users_things` ut where 
          cp.`check-in_id` = :checkInId and 
          cp.place_id = p.id and 
          p.id = pt.place_id and 
          t.id = pt.thing_id AND 
          ut.user_id = :userId AND 
          pt.thing_id = ut.thing_id order by place')
            ->bind(':checkInId', $checkInId)
            ->bind(':userId', $userId);
    }
}