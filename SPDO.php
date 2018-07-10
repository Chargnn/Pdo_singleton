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

        $this->PDOInstance->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->PDOInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new SPDO();
        }

        return self::$instance;
    }

    public function query($query){
        return $this->PDOInstance->query($query);
    }

}