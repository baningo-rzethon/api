<?php
/**
 * Created by Gabriel Ślawski
 * Date: 11.11.18
 * Time: 12:36
 */

namespace app\models;

use app\core\Model;
use app\core\Database;

/**
 * Class User
 * @package app\models
 */
class User extends Model
{
    /**
     * @var string $tableName
     */
    public $tableName = 'users';

    /**
     * @param string $email
     * @return Database
     */
    public function findByEmail(string $email): Database
    {
        $this->db->query('select * from ' . $this->tableName . ' where email = :email');

        return $this->db->bind(':email', $email);
    }

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
}