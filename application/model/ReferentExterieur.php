<?php 
namespace application\model;

class ReferentExterieur Extends \core\model\Model {
    
    
    function loadReferent() { 
	    $tableau = array();
	    $i = 0;
        $reponse = $this->bd->query('SELECT idReferentExterieur, nom, prenom, telephone, mail
								FROM referentexterieur');

		$donnees = $reponse->fetchAll();
		$reponse->closeCursor(); 
		return $donnees;
    } 
	
	function insertReferent($Referent) { 
        
    $req = $this->bd->prepare('INSERT INTO referentexterieur(nom, prenom, telephone, mail)
					     VALUES(:nom, :prenom, :telephone, :mail)');
	$req->bindParam(':nom',$Referent['mail']);
	$req->bindParam(':prenom',$Referent['nom']);
	$req->bindParam(':telephone',$Referent['prenom']);
	$req->bindParam(':mail',$Referent['mail']);
	$req->execute();
    }
	
	function updateReferent($Referent) { 
	
		$req = $this->bd->prepare('UPDATE referentexterieur SET nom="'.$Referent['nom'].'", prenom="'.$Referent['telephone'].'", telephone="'.$Referent['tel'].'", mail="'.$Referent['mail'].'"
							  WHERE idReferentExterieur='.$Referent['id']);
		$req->execute();
    } 
	function deleteReferent($Referent) {
		$req = $this->bd->prepare('DELETE FROM referentexterieur WHERE nom ="'.$Referent['nom'].'" AND prenom = "'.$Referent['prenom'].'"');
		$req->execute();
    } 
} 





?>