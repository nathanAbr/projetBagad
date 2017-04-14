<?php
namespace application\model;

class Adresse Extends \core\model\Model {


    function loadAdresse() {
        $tableau = array();
        $i = 0;
        $reponse = $this->db->query('SELECT idAdresse, rue1, rue2, complement, l.ville, l.pays, l.codePostale
						        FROM adresse 
						        INNER JOIN localite l ON fk_localite = l.idLocalite');

        $donnees = $reponse->fetchAll();
        $reponse->closeCursor();
        return $donnees;
    }

    function insertAdresse($Adresse) {

        $req = $this->db->prepare('INSERT INTO adresse(rue1, rue2, complement, fk_localite)
					          VALUES(:rue1, :rue2, :complement, :fk_localite) ');
        $req->bindParam(':rue1',$Adresse->rue1);
        $req->bindParam(':rue2',$Adresse->rue2);
        $req->bindParam(':complement',$Adresse->complement);
        $req->bindParam(':fk_localite',$Adresse->localite[0][0]);
        $req->execute();
        $req = $this->db->query('SELECT LAST_INSERT_ID() FROM adresse');
		$req = $req->fetchAll();
        return $req;
    }

    function updateAdresse($Adresse) {

        $req = $this->db->prepare('UPDATE adresse SET rue1="'.$Adresse['rue1'].'", rue2="'.$Adresse['rue2'].'", complement="'.$Adresse['complement'].'", fk_localite="'.$Adresse['idLocalite'].'"
							  WHERE idAdresse="'.$Adresse['id'].'"');
        $req->execute();
    }
    function deleteAdresse($Adresse) {
        $req = $this->db->prepare('DELETE FROM adresse WHERE idAdresse ="'.$Adresse['id'].'"');
        $req->execute();
    }
}





?>