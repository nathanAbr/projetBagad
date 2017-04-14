<?php 
namespace application\model;

class ReferentExterieur Extends \core\model\Model {
    
    
    function loadReferent() { 
	    $tableau = array();
	    $i = 0;
        $reponse = $this->db->query('SELECT idReferentExterieur, nom, prenom, telephone, mail
								FROM referentexterieur');

		$donnees = $reponse->fetchAll();
		$reponse->closeCursor(); 
		return $donnees;
    } 
	
	function insertReferent($Referent) { 
        
    $req = $this->db->prepare('INSERT INTO referentexterieur(nom, prenom, telephone, mail)
					     VALUES(:nom, :prenom, :telephone, :mail)');
	$req->bindParam(':nom',$Referent->nom);
	$req->bindParam(':prenom',$Referent->prenom);
	$req->bindParam(':telephone',$Referent->tel);
	$req->bindParam(':mail',$Referent->mail);
	$req->execute();
	$req = $this->db->query('SELECT LAST_INSERT_ID() FROM localite');
    $result = $req->fetchAll();
	
	return $result;	
	
    }
	
	function updateReferent($Referent) { 
	
		$req = $this->db->prepare('UPDATE referentexterieur SET nom="'.$Referent['nom'].'", prenom="'.$Referent['telephone'].'", telephone="'.$Referent['tel'].'", mail="'.$Referent['mail'].'"
							  WHERE idReferentExterieur='.$Referent['id']);
		$req->execute();
    } 
	function deleteReferent($Referent) {
		$req = $this->bd->prepare('DELETE FROM referentexterieur WHERE nom ="'.$Referent['nom'].'" AND prenom = "'.$Referent['prenom'].'"');
		$req->execute();
    } 
} 





?>