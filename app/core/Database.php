<?php
/**
 * Created by Gabriel Ślawski
 * Date: 09.11.18
 * Time: 11:14
 */

namespace app\core;

use PDO;
use PDOException;

/**
 * Class Database
 * @package app\core
 */
class Database
{
    /**
     * @var string $host
     */
    private $host = DB_HOST;

    /**
     * @var string $name
     */
    private $name = DB_NAME;

    /**
     * @var string $user
     */
    private $user = DB_USER;

    /**
     * @var string $password
     */
    private $password = DB_PASSWORD;

    /**
     * @var PDO $dbh
     */
    private $dbh;

    /**
     * @var $stmt - contains PDO statement
     */
    private $stmt;

    /**
     * @var string $error
     */
    private $error;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        try {
            $this->dbh = new PDO($this->getDsn(), $this->user, $this->password, $this->getOptions());
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * @param string $sql
     * @return Database
     */
    public function query(string $sql): self
    {
        $this->stmt = $this->dbh->prepare($sql);

        return $this;
    }

    /**
     * @param string $param
     * @param        $value
     * @param null   $type
     * @return Database
     */
    public function bind(string $param, $value, $type = null): self
    {
        if (!$type) {
            $type = $this->resolveType($value);
        }

        $this->stmt->bindValue($param, $value, $type);

        return $this;
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        return $this->stmt->execute();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $this->execute();

        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @return mixed
     */
    public function getFirst()
    {
        $this->execute();

        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @return mixed
     */
    public function count()
    {
        $this->execute();

        return $this->stmt->rowCount();
    }

    /**
     * @param $value
     * @return int
     */
    private function resolveType($value): int
    {
        $type = PDO::PARAM_STR;
        switch ($value) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_INT;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
        }

        return $type;
    }

    /**
     * @return string
     */
    private function getDsn()
    {
        return 'mysql:host=' . $this->host . ';dbname=' . $this->name;
    }

    /**
     * @return array
     */
    private function getOptions()
    {
        return [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
        ];
    }
}