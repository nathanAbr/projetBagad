<?php

/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 11/04/2017
 * Time: 12:48
 */
namespace application\controller;
class Accueil extends \core\controller\Controller
{
    public function __construct(){
        $data['title'] = 'Bienvenue sur notre gestionnaire d\'évènements';
        $this->loadView('accueil', $data);
    }
}