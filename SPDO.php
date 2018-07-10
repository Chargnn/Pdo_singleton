<?php
class SPDO{

    private $PDOInstance = null;
    private static $instance = null;

    const SQL_USER = 'root';
    const SQL_HOST = 'localhost';
    const SQL_PASSWORD = '';
    const SQL_DB = 'database';

    private function __construct()
    {
        $this->PDOInstance = new PDO('mysql:dbname='.self::SQL_DB.';host='.self::SQL_HOST, self::SQL_USER, self::SQL_PASSWORD);

        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new SPDO();
        }

        return self::$instance;
    }

    /**
     * @param $attribute
     * @param null $value
     */

    public function setAttribute($attribute, $value = null){
        $this->PDOInstance->setAttribute($attribute, $value);
    }

    /**
     * Execute an SQL query
     * @param $query
     * @return bool|PDOStatement
     */

    public function query($query){
        return $this->PDOInstance->query($query);
    }

    /**
     * Execute an SQL query and return all rows in assoc array
     * @param $query
     * @return array
     */

    public function queryFetchAllAssoc($query){
        return $this->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Execute an SQL query and return one row in assoc array
     * @param $query
     * @return mixed
     */

    public function queryFetchRowAssoc($query){
        return $this->query($query)->fetch(PDO::FETCH_ASSOC);
    }

    public function quote($value){
        return $this->PDOInstance->quote($value);
    }

}