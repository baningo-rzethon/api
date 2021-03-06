<?php

namespace app\models;

use app\core\Model;
use app\core\Database;

/**
 * Class Place
 * @package app\models
 */
class Place extends Model
{
    /**
     * @var string $tableName
     */
    public $tableName = 'places';

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
     * @param int $placeId
     * @return Database
     */
    public function getThingsIds(int $placeId): Database
    {
        $this->db->query('select thing_id from places_things where place_id = :placeId');

        return $this->db->bind(':placeId', $placeId);
    }

    /**
     * @param int $placeId
     * @return Database
     */
    public function getCheckInsIds(int $placeId): Database
    {
        $this->db->query('select check-in_id from check-ins_places where place_id = :placeId');

        return $this->db->bind(':placeId', $placeId);
    }
}