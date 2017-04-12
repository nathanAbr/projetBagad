<?php 
namespace application\model;

class TypeEvenement_Model Extends \core\model\Model{
    
    
    function loadType() {
	    $tableau = array();
	    $i = 0;
        $reponse = $bd->query('SELECT idType, libelle
						FROM typeevenement');

        $donnees = $reponse->fetchAll();
        $reponse->closeCursor();
        return $donnees;
    } 
	
	function inserType($Type) {
		
        $req =$bd->prepare('INSERT INTO typeevenement(libelle)
					        VALUES(:libelle)');
        $req->bindParam(':libelle',$Type['libelle']);
        $req->execute();

        if($req){
            echo 'Le jeu a bien �t� ajout� !';
        }
    }
	
	function updateType($Type) {

        $req = $bd->prepare('UPDATE typeevenement SET libelle="'.$Type['type'].'"
							  WHERE idType='.$Type['Type']);
        $req->execute();
        if($req){
            echo 'Le jeu a bien �t� mis � jour !';
        }
    } 
	function deleteType($Type) {
		$req = $bd->prepare('DELETE FROM typeevenement WHERE id ="'.$Type['id'].'"');
		$req->execute();
		if($req){
			echo 'Le jeu a bien �t� supprim� !';
		}
    } 
} 

?>