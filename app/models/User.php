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

    /**
     * @param int $id
     * @return Database
     */
    public function getThingsIds(int $userId): Database
    {
        $this->db->query('select thing_id from users_things where user_id = :userId');

        return $this->db->bind(':userId', $userId);
    }

    /**
     * @param int $userId
     * @return Database
     */
    public function getCheckIns(int $userId): Database
    {
        $this->db->query('select * from users_check-ins where user_id = :userId');

        return $this->db->bind(':userId', $userId);
    }

    /**
     * @param int $userId
     * @return Database
     */
    public function getCheckInsIds(int $userId): Database
    {
        $this->db->query('select check-in_id from users_check-ins where user_id = :userId');

        return $this->db->bind(':userId', $userId);
    }

    /**
     * @param int $userId
     * @param int $checkInId
     * @return Database
     */
    public function getCheckInsFrom(int $userId, int $checkInId): Database
    {
        $this->db->query('select * from users_check-ins where user_id = :userId, check-in_id  = :checkInId');

        return $this->db->bind(':userId', $userId)->bind(':checkInId', $checkInId);
    }
}