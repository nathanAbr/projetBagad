<?php 
namespace application\model;

class TypeEvenement Extends \core\model\Model{
    
    
    function loadType() {
	    $tableau = array();
	    $i = 0;
        $reponse = $this->bd->query('SELECT idType, libelle
						FROM typeevenement');

        $donnees = $reponse->fetchAll();
        $reponse->closeCursor();
        return $donnees;
    } 
	
	function inserType($Type) {
		
        $req =$this->bd->prepare('INSERT INTO typeevenement(libelle)
					        VALUES(:libelle)');
        $req->bindParam(':libelle',$Type['libelle']);
        $req->execute();
    }
	
	function updateType($Type) {

        $req = $this->bd->prepare('UPDATE typeevenement SET libelle="'.$Type['type'].'"
							  WHERE idType='.$Type['Type']);
        $req->execute();
    } 
	function deleteType($Type) {
		$req = $this->bd->prepare('DELETE FROM typeevenement WHERE id ="'.$Type['id'].'"');
		$req->execute();
    } 
} 

?>