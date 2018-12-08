<?php

namespace app\models;

use app\core\Model;
use app\core\Database;

/**
 * Class Category
 * @package app\models
 */
class Category extends Model
{
    /**
     * @var string $tableName
     */
    public $tableName = 'categories';

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
     * @param int $catId
     * @return Database
     */
    public function getThings(int $catId): Database
    {
        $this->db->query('select * from things where category = :catId');

        return $this->db->bind(':catId', $catId);
    }
}