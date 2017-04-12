<?php

/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 11/04/2017
 * Time: 12:48
 */
namespace application\controller;

use \core\controller\Controller;

class Accueil extends Controller
{
    public function __construct(){
        session_start();
        if(isset($_SESSION['users'])) {
            $data['title'] = 'Bienvenue sur notre gestionnaire d\'évènements';
            $data['logo'] = 'application/assets/logo/logo.png';
            $this->loadView('accueil', $data);
        }
        else{
            $data['error_message'] = 'Vous devez être connecté pour accèder à cette page';
            $this->loadView('login', $data, false);
        }
    }
}