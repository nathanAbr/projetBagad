<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 12/04/2017
 * Time: 10:29
 */

namespace application\controller;


class Users extends \core\controller\Controller
{
    public function __construct(){
        if(!isset($_SESSION['users'])) {
            $this->loadView('login', array(), false);
        }
        else{
            header('Location: http://localhost/projetbagad/index.php?pages=Accueil');
        }
    }

    public function login(){

    }
}