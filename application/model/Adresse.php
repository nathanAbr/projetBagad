<?php
namespace application\model;

class Adresse Extends \core\model\Model {


    function loadAdresse() {
        $tableau = array();
        $i = 0;
        $reponse = $this->bd->query('SELECT idAdresse, rue1, rue2, complement, l.ville, l.pays, l.codePostale
						        FROM adresse 
						        INNER JOIN localite l ON fk_localite = l.idLocalite');

        $donnees = $reponse->fetchAll();
        $reponse->closeCursor();
        return $donnees;
    }

    function insertAdresse($Adresse) {

        $req = $this->bd->prepare('INSERT INTO adresse(rue1, rue2, complement, fk_localite)
					          VALUES(:rue1, :rue1, :complement, :fk_localite)');
        $req->bindParam(':rue1',$Adresse['rue1']);
        $req->bindParam(':rue1',$Adresse['rue2']);
        $req->bindParam(':complement',$Adresse['complement']);
        $req->bindParam(':complement',$Adresse['idLocalite']);
        $req->execute();
    }

    function updateAdresse($Adresse) {

        $req = $this->bd->prepare('UPDATE adresse SET rue1="'.$Adresse['rue1'].'", rue2="'.$Adresse['rue2'].'", complement="'.$Adresse['complement'].'", fk_localite="'.$Adresse['idLocalite'].'"
							  WHERE idAdresse="'.$Adresse['id'].'"');
        $req->execute();
    }
    function deleteAdresse($Adresse) {
        $req = $this->bd->prepare('DELETE FROM adresse WHERE idAdresse ="'.$Adresse['id'].'"');
        $req->execute();
    }
}





?>