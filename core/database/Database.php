<?php

namespace core\database;

use \PDO;

class Database
{
    private static $instance;

    protected $_username;
    protected $_password;
    protected $_database;
    protected $_host;

    public $db;

    private function __construct()
    {
        $valide = false;
        foreach(file('application/config/db.conf') as $config){
            $key = explode(':', rtrim($config));
            if($key[0] == 'username'){
                $this->_username = $key[1];
            }
            elseif($key[0] == 'password'){
                $this->_password = $key[1];
            }
            elseif($key[0] == 'database'){
                $this->_database = $key[1];
            }
            elseif($key[0] == 'host'){
                $this->_host = $key[1];
                $valide = true;
            }
        }
        if($valide) {
            try{
                $this->db = new PDO('mysql:host=' . $this->_host . ';dbname=' . $this->_database . ';charset=utf8', $this->_username, $this->_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            catch(\PDOException $e){
                die($e->getMessage());
            }
        }
    }

    public static function getInstance()
    {
        if(is_null(self::$instance))
        {
            self::$instance = new Database();
        }
        return self::$instance;
    }


}