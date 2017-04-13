<?php 

namespace application\model;
class ActualiteModel Extends \core\model\Model { 
    
    
    function loadActu() { 
	    $tableau = array();
        $reponse = $this->db->query('SELECT idActualite, titre, image, description, date, m.nom, m.prenom 
								FROM actualite 
								INNER JOIN membre m ON fk_membre = m.idMembre');
        
		$donnees = $reponse->fetchAll();
		$reponse->closeCursor(); 
		return $donnees ;
    } 
	
	function insertActu($Actualite) { 
       
    $req = $this->db->prepare('INSERT INTO actualite(titre, image, description, date, fk_membre) VALUES(:titre, :image, :description, :date, :idMembre)');
	$req->bindParam(':titre',$Actualite->titre);
	$req->bindParam(':image',$Actualite->image);
	$req->bindParam(':description',$Actualite->description);
	$req->bindParam(':date',$Actualite->date);
	$req->bindParam(':idMembre',$Actualite->idMembre);
	$req->execute();

		if($req){
			
			echo 'Le jeu a bien ete ajoute !';
		}
    }
	
	function updateActu($Actualite) { 
	
		$req = $this->db->prepare('UPDATE actualite SET titre="'.$Actualite['titre'].'", image="'.$Actualite['image'].'",
										   description="'.$Actualite['description'].'", date="'.$Actualite['date'].'", fk_membre = "'.$Actualite['idMembre'].'"  
							  WHERE idActualite='.$Actualite['id']);
		$req->execute();
		if($req){
			echo 'Le jeu a bien �t� ajout� !';
		}
    } 
	function deleteActu($Actualite) { 
		$req = $this->db->prepare('DELETE FROM actualite WHERE titre ="'.$Actualite['titre'].'"');
		$req->execute();
		if($req){
			echo 'Le jeu a bien �t� supprim� !';
		}
    } 

    function getOnceActu($id){
    	$reponse = $this->db->query('SELECT idActualite, titre, image, description, date 
								FROM actualite 
								
								WHERE idActualite = '.$id);

        
		$donnees = $reponse->fetchAll();
		$reponse->closeCursor(); 
		return $donnees ;
    }
} 





?>