<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 12/04/2017
 * Time: 13:50
 */

namespace application\controller;


class Membres extends \core\controller\Controller
{
    public function showProfil(){
        $this->loadView('membres');
    }

    public function addMembre(){
        $groupes = new \application\model\Groupe();
        $data["groupes"] = $groupes->getAllGroupes();
        $roles = new \application\model\Role();
        $data["roles"] = $roles->getAllRoles();
        $instruments = new \application\model\Instruments();
        $data["instruments"] = $instruments->getAllInstruments();
        $mdp = $this->password();
        if(isset($_POST['save'])){
            $membre = new \stdClass();
            $adresseMembre = new \stdClass();
            $localiteMembre = new \stdClass();
            $membre->nom = $_POST['name'];
            $membre->prenom = $_POST['secondName'];
            $membre->dateNaissance = date('Y-m-d h:i:s', strtotime($_POST['ddn']));
            $membre->mail = $_POST['mail'];
            $membre->telephone = $_POST['tel'];
            $adresseMembre->rue1 = $_POST['rue1'];
            $adresseMembre->rue2 = $_POST['rue2'];
            $adresseMembre->complement = $_POST['complement'];
            $localiteMembre->codepostale = $_POST['cp'];
            $localiteMembre->ville = $_POST['ville'];
            $localiteMembre->pays = $_POST['pays'];
            $membre->instrument = $_POST['instrument'];
            $membre->groupe = $_POST['groupe'];
            $membre->login = $_POST['name'].$_POST['secondName'];
            $membre->password = md5($mdp);
            /*foreach($_POST['roles'] as $role) {
                $membre->role[] = $role;
            }*/
            $localite = new \application\model\Localite();
            $adresse = new \application\model\Adresse();
            $adresseMembre->localite = $localite->insertLocalite($localiteMembre);
            $membre->adresse = $adresse->insertAdresse($adresseMembre);
            $addMembre = new \application\model\Membre();
            if($addMembre->insertMembre($membre)){
                $data['success'] = 'Le membre '.$membre->nom.' à bien été ajouté.</br>Son login est '.$_POST['name'].$_POST['secondName'].' et son mot de passe '.$mdp;
            }
            $this->loadView('addmembre', $data);
        }
        else{
            $this->loadView('addmembre', $data);
        }
    }

    private function password(){
        $char = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $mot_de_passe = str_shuffle($char);
        $mot_de_passe = substr($mot_de_passe, 5, 8);
        return $mot_de_passe;
    }
}