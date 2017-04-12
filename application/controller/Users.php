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
        session_start();
        if(!isset($_SESSION['users'])) {
            $this->loadView('login', array(), false);
        }
        else{
            header('Location: http://localhost/projetbagad/index.php?pages=Accueil');
        }
    }

    public function login(){
        session_start();
        if(isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = md5($_POST['password']);
            $user = new \application\model\Users();
            $session = $user->getUser($login, $password);
            $_SESSION['users'] = $session;
            if(!empty($_SESSION['users'])) {
                header('Location: http://localhost/projetbagad/index.php?pages=Accueil');
            }
            else{
                $data['error_message'] = 'Une erreur est survenu, veuillez réessayer ultérieurement.';
                $this->loadView('login', $data, false);
            }
        }
    }
}