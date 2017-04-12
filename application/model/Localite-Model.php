<?php 
class Localite_Model Extends core.Model {
    
    
    function loadLocalite() {
	    $tableau = array();
	    $i = 0;
        $reponse = $bdd->query('SELECT idLocalite, ville, pays, codePostale
						FROM localite');

		$donnees = $reponse->fetchAll();
		$reponse->closeCursor(); 
		return $donnees;
    }

    function insertLocalite($Localite) {

        $req->prepare('INSERT INTO localite(ville, pays, codePostale)
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

        $req = $bdd->prepare('UPDATE localite SET ville="'.$Localite['ville'].'", pays="'.$Localite['pays'].'", codePostale="'.$Localite['cp'].'"
							  WHERE idLocalite="'.$Localite['id'].'"');
        $req->execute();
        if($req){
            echo 'Le jeu a bien �t� mis � jour !';
        }
    }
    function deleteLocalite($Localite) {
        $req = $bdd->prepare('DELETE FROM localite WHERE idLocalite ="'.$Localite['id'].'"');
        $req->execute();
        if($req){
            echo 'Le jeu a bien �t� supprim� !';
        }
    }
} 





?>