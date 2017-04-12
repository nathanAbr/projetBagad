<?php 
namespace application\model;

class Localite_Model Extends \core\model\Model {
    
    
    function loadLocalite() {
	    $tableau = array();
	    $i = 0;
        $reponse = $bd->query('SELECT idLocalite, ville, pays, codePostale
						       FROM localite');

		$donnees = $reponse->fetchAll();
		$reponse->closeCursor(); 
		return $donnees;
    }

    function insertLocalite($Localite) {

        $req = $bd->prepare('INSERT INTO localite(ville, pays, codePostale)
					         VALUES(:ville, :pays, :codePostale)');
        $req->bindParam(':ville',$Localite['ville']);
        $req->bindParam(':pays',$Localite['pays']);
        $req->bindParam(':codePostale',$Localite['cp']);
        $req->execute();

        if($req){
            echo 'Le jeu a bien �t� ajout� !';
        }
    }

    function updateLocalite($Localite) {

        $req = $bd->prepare('UPDATE localite SET ville="'.$Localite['ville'].'", pays="'.$Localite['pays'].'", codePostale="'.$Localite['cp'].'"
							  WHERE idLocalite="'.$Localite['id'].'"');
        $req->execute();
        if($req){
            echo 'Le jeu a bien �t� mis � jour !';
        }
    }
    function deleteLocalite($Localite) {
        $req = $bd->prepare('DELETE FROM localite WHERE idLocalite ="'.$Localite['id'].'"');
        $req->execute();
        if($req){
            echo 'Le jeu a bien �t� supprim� !';
        }
    }
} 





?>