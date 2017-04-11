<?php

/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 28/03/2017
 * Time: 10:36
 */

namespace core\database;

use \PDO;

class Database
{
    private static $instance;

    protected $_username;
    protected $_password;
    protected $_database;
    protected $_host;

    protected $db;

    public function __construct()
    {
        $valide = false;
        fopen('application/config/db.cong', 'w+');
        foreach(file('application/config/db.cong') as $config){
            $key = explode(':', $config);
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
            $this->db = new PDO('mysql:host=' . $this->_host . ';dbname=' . $this->_database . ';charset=utf8', $this->_username, $this->_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        else{
            return 'Erreur, veuillez vérifier votre fichier db.conf';
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