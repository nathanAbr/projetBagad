<?php 
namespace application\model;

class Evenement Extends \core\model\Model {
    
    
    function loadEvent() { 
	    $tableau = array();
	    $i = 0;
        $reponse = $this->db->query('SELECT e.idEvenement, e.nom as "eventNom", e.dateDebut, e.dateFin, e.cachet, e.description,
										e.image, e.valider, a.rue1, a.rue2, a.complement, l.ville, l.pays, l.codePostale, 
										t.libelle as "typeEvenement", m.nom as "createurNom" ,m.prenom as "createurPrenom", 
										r.nom as "referentNom", r.prenom as "referentPrenom", r.telephone as "referentTel", 
										r.mail as "referentMail" 
								FROM evenement e 
								INNER JOIN adresse a ON fk_adresse = a.idAdresse 
								INNER JOIN localite l ON a.fk_localite = l.idLocalite 
								INNER JOIN typeevenement t ON fk_type = t.idType 
								INNER JOIN membre m ON e.fk_membre = m.idMembre 
								INNER JOIN referentexterieur r ON e.fk_referentExterieur = r.idreferentExterieur');

								$result= $reponse->fetchAll();
		$reponse->closeCursor(); 
		return $result;
    } 
	
	function insertEvent($event) { 
        
    $req = $this->db->prepare('INSERT INTO evenement(nom, dateDebut, dateFin, cachet, description,image,valider,fk_adresse,fk_type,fk_membre,fk_referentExterieur) 
				         VALUES(:nom,:dateDebut,:dateFin,:cachet, :description, :image, :valider, :idAdresse, :idType, :idMembre, :idReferent)');
	$req->bindParam(':nom',$event->nom);
	$req->bindParam(':dateDebut',$event->dateDebut);
	$req->bindParam(':dateFin',$event->dateFin);
	$req->bindParam(':cachet',$event->cachet);
	$req->bindParam(':description',$event->description);
	$req->bindParam(':image',$event->image);
	$req->bindParam(':valider',$event->valide);
	$req->bindParam(':idAdresse',$event->idAdresse[0][0]);       
	$req->bindParam(':idType',$event->idType);
	$req->bindParam(':idMembre',$event->idCreateur);
	$req->bindParam(':idReferent',$event->idReferent[0][0]);
	$req->execute();
    }
	
	function updateEvent($event) { 
	
		$req = $this->db->prepare('UPDATE evenement SET nom="'.$event->nom.'", image="'.$event->image.'", dateFin= "'.$event->dateFin.'", valider= "'.$event->valider.'",
										   description="'.$event->description.'", dateDebut="'.$event->dateDebut.'", cachet="'.$event->cachet.'"    
							  WHERE idEvenement='.$event->idEvent);
		$req->execute();
    } 
	function deleteEvent($event) { 
		$req = $this->db->prepare('DELETE FROM evenement WHERE idEvenement ="'.$event->idEvent.'"');
		$req->execute();
    } 
} 





?>