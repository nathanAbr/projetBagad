<?php

/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 11/04/2017
 * Time: 10:25
 */

namespace core\model;

class Model
{
    protected $db;

    public function __construct(){
        $db = \core\database\Database::getInstance();
    }
}