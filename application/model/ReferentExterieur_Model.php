<?php 
namespace application\model;

class ReferentExterieur_Model Extends \core\model\Model { 
    
    
    function loadReferent() { 
	    $tableau = array();
	    $i = 0;
        $reponse = $bd->query('SELECT idReferentExterieur, nom, prenom, telephone, mail
								FROM referentexterieur');

		$donnees = $reponse->fetchAll();
		$reponse->closeCursor(); 
		return $donnees;
    } 
	
	function insertReferent($Referent) { 
        
    $req = $bd->prepare('INSERT INTO referentexterieur(nom, prenom, telephone, mail)
					     VALUES(:nom, :prenom, :telephone, :mail)');
	$req->bindParam(':nom',$Referent['mail']);
	$req->bindParam(':prenom',$Referent['nom']);
	$req->bindParam(':telephone',$Referent['prenom']);
	$req->bindParam(':mail',$Referent['mail']);
	$req->execute();

		if($req){
			echo 'Le jeu a bien �t� ajout� !';
		}
    }
	
	function updateReferent($Referent) { 
	
		$req = $bd->prepare('UPDATE referentexterieur SET nom="'.$Referent['nom'].'", prenom="'.$Referent['telephone'].'", telephone="'.$Referent['tel'].'", mail="'.$Referent['mail'].'"
							  WHERE idReferentExterieur='.$Referent['id']);
		$req->execute();
		if($req){
			echo 'Le jeu a bien �t� mis � jour !';
		}
    } 
	function deleteReferent($Referent) {
		$req = $bd->prepare('DELETE FROM referentexterieur WHERE nom ="'.$Referent['nom'].'" AND prenom = "'.$Referent['prenom'].'"');
		$req->execute();
		if($req){
			echo 'Le jeu a bien �t� supprim� !';
		}
    } 
} 





?>