<?php
/**
 * Created by Gabriel Ślawski
 * Date: 11.11.18
 * Time: 12:23
 */

namespace app\core;

/**
 * Class Model
 * Basic Model class. Every model should extends this class.
 *
 * @package app\core
 */
class Model
{
    /**
     * @var null|string $tableName
     */
    public $tableName = null;

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
     * @return mixed
     */
    public function all()
    {
        return $this->db->query('select * from '.$this->tableName)->getAll();
    }

    /**
     * @return mixed
     */
    public function first()
    {
        return $this->db->query('select * from '.$this->tableName)->getFirst();
    }

    /**
     * @return mixed
     */
    public function count()
    {
        return $this->db->query('select * from '.$this->tableName)->count();
    }
}