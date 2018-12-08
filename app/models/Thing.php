<?php

namespace app\models;

use app\core\Model;
use app\core\Database;

/**
 * Class Thing
 * @package app\models
 */
class Thing extends Model
{
    /**
     * @var string $tableName
     */
    public $tableName = 'things';

    /**
     * @param string $name
     * @return Database
     */
    public function findByName(string $name): Database
    {
        $this->db->query('select * from ' . $this->tableName . ' where name = :name');

        return $this->db->bind(':name', $name);
    }

    /**
     * @param int $id
     * @return Database
     */
    public function find(int $id): Database
    {
        $this->db->query('select * from ' . $this->tableName . ' where id = :id');

        return $this->db->bind(':id', $id);
    }

    /**
     * @param int $thingId
     * @return Database
     */
    public function getPlacesIds(int $thingId): Database
    {
        $this->db->query('select place_id from places_things where thing_id = :thingId');

        return $this->db->bind(':thingId', $thingId);
    }
}