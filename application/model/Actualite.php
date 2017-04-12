<?php 

namespace application\model;
class Actualite Extends \core\model\Model {

    function loadActu() { 
	    $tableau = array();
	    $i = 0;
        $reponse = $this->bd->query('SELECT idActualite, titre, image, description, date, m.nom, m.prenom 
								FROM actualite 
								INNER JOIN membre m ON fk_membre = m.idMembre');

		$donnees = $reponse->fetchAll();
		$reponse->closeCursor(); 
		return $donnees ;
    } 
	
	function insertActu($Actualite) {
        $req = $this->bd->prepare('INSERT INTO actualite(titre, image, description, date, fk_membre) VALUES(:titre, :image, :description, :date, :idMembre)');
        $req->bindParam(':titre',$Actualite['titre']);
        $req->bindParam(':image',$Actualite['image']);
        $req->bindParam(':description',$Actualite['description']);
        $req->bindParam(':date',$Actualite['date']);
        $req->bindParam(':idMembre',$Actualite['idMembre']);
        $req->execute();
    }
	
	function updateActu($Actualite) { 
	
		$req = $this->bd->prepare('UPDATE actualite SET titre="'.$Actualite['titre'].'", image="'.$Actualite['image'].'",
										   description="'.$Actualite['description'].'", date="'.$Actualite['date'].'", fk_membre = "'.$Actualite['idMembre'].'"  
							  WHERE idActualite='.$Actualite['id']);
		$req->execute();
    } 
	function deleteActu($Actualite) { 
		$req = $this->bd->prepare('DELETE FROM actualite WHERE titre ="'.$Actualite['titre'].'"');
		$req->execute();
    } 
} 





?>