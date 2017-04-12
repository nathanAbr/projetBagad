<?php 
class Evenement_Model Extends core.Model { 
    
    
    function loadEvent() { 
	    $tableau = array();
	    $i = 0;
        $reponse = $bdd->query('SELECT e.idEvenement, e.nom as "eventNom", e.dateDebut, e.dateFin, e.cachet, e.description,
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
        
    $req->prepare('INSERT INTO evenement(nom, dateDebut, dateFin, cachet, description,image,valider,fk_adresse,fk_type,fk_membre,fk_referentExterieur) 
				   VALUES(:nom,:dateDebut,:dateFin,:cachet, :description, :image, :valider, :idAdresse, :idType, :idMembre, :idReferent)');
	$req->bindParam(':eventNom',$event['nom']);
	$req->bindParam(':dateDebut',$event['dateDebut']);
	$req->bindParam(':dateFin',$event['dateFin']);
	$req->bindParam(':cachet',$event['cachet']);
	$req->bindParam(':description',$event['description']);
	$req->bindParam(':image',$event['image']);
	$req->bindParam(':valider',$event['valider']);
	$req->bindParam(':idAdresse',$event['fk_adresse']);
	$req->bindParam(':idType',$event['fk_type']);
	$req->bindParam(':idMembre',$event['fk_membre']);
	$req->bindParam(':idReferent',$event['fk_referentExterieur']);
	
	
	$req->execute();

		if($req){
			
			echo 'Le jeu a bien été ajouté !';
		}
    }
	
	function updateEvent($event) { 
	
		$req = $bdd->prepare('UPDATE evenement SET nom="'.$event['nom'].'", image="'.$event['image'].'", dateFin= "'.$event['dateFin'].'", valider= "'.$event['valider'].'",
										   description="'.$event['description'].'", dateDebut="'.$event['dateDebut'].'", cachet="'.$event['cachet'].'"    
							  WHERE idEvenement='.$event['idEvent']);
		$req->execute();
		if($req){
			echo 'Le jeu a bien été mis à jour !';
		}
    } 
	function deleteActu() { 
		$req = $bdd->prepare('DELETE FROM evenement WHERE idEvenement ="'.$event['idEvent'].'"');
		$req->execute();
		if($req){
			echo 'Le jeu a bien été supprimé !';
		}
    } 
} 





?>