<?php

namespace app\models;

use app\core\Model;
use app\core\Database;

/**
 * Class CheckIn
 * @package app\models
 */
class CheckIn extends Model
{
    /**
     * @var string $tableName
     */
    public $tableName = 'check-ins';

    /**
     * @param string $name
     * @return Database
     */
    public function findByName(string $name): Database
    {
        $this->db->query('select * from `' . $this->tableName . '` where name = :name');

        return $this->db->bind(':name', $name);
    }

    /**
     * @param int $id
     * @return Database
     */
    public function find(int $id): Database
    {
        $this->db->query('select * from `' . $this->tableName . '` where id = :id');

        return $this->db->bind(':id', $id);
    }

    /**
     * @param int $checkInId
     * @return Database
     */
    public function getPlacesIds(int $checkInId): Database
    {
        $this->db->query('select place_id from `check-ins_places` where `check-in_id` = :checkInId');

        return $this->db->bind(':checkInId', $checkInId);
    }
}