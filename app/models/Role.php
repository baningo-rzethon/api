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
 * Class Role
 * @package app\models
 */
class Role extends Model
{
    /**
     * role name administrator
     */
    const ADMINISTRATOR = 'administrator';

    /**
     * role name user
     */
    const USER = 'user';

    /**
     * role name guest
     */
    const GUEST = 'guest';

    /**
     * @var string $tableName
     */
    public $tableName = 'roles';

    /**
     * @param int $id
     * @return Database
     */
    public function getRoleName(int $id): Database
    {
        $this->db->query('select * from ' . $this->tableName . ' where id = :id');

        return $this->db->bind(':id', $id);
    }
}