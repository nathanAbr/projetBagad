<?php 
namespace application\model;

class Localite Extends \core\model\Model {
    
    
    function loadLocalite() {
	    $tableau = array();
	    $i = 0;
        $reponse = $this->bd->query('SELECT idLocalite, ville, pays, codePostale
						       FROM localite');

		$donnees = $reponse->fetchAll();
		$reponse->closeCursor(); 
		return $donnees;
    }

    function insertLocalite($Localite) {

        $req = $this->bd->prepare('INSERT INTO localite(ville, pays, codePostale)
					         VALUES(:ville, :pays, :codePostale)');
        $req->bindParam(':ville',$Localite['ville']);
        $req->bindParam(':pays',$Localite['pays']);
        $req->bindParam(':codePostale',$Localite['cp']);
        $req->execute();
    }

    function updateLocalite($Localite) {

        $req = $this->bd->prepare('UPDATE localite SET ville="'.$Localite['ville'].'", pays="'.$Localite['pays'].'", codePostale="'.$Localite['cp'].'"
							  WHERE idLocalite="'.$Localite['id'].'"');
        $req->execute();
    }
    function deleteLocalite($Localite) {
        $req = $this->bd->prepare('DELETE FROM localite WHERE idLocalite ="'.$Localite['id'].'"');
        $req->execute();
    }
} 





?>