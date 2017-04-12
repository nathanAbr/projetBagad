<?php 
namespace application\model;

class Membre Extends \core\model\Model {
    
    
    function loadMembre() { 
	    $tableau = array();
	    $i = 0;
        $reponse = $this->bd->query('SELECT m.idMembre, m.mail, m.nom, m.prenom, m.dateNaissance, m.telephone, m.login, m.motDePasse,
										i.nom as "instrument", a.rue1 as "rue", l.ville , l.pays, l.codePostale, g.libelle 
								FROM membre m 
								INNER JOIN instrument i ON m.fk_instrument = i.idInstrument 
								INNER JOIN adresse a ON m.fk_adresse = a.idAdresse 
								INNER JOIN localite l ON a.fk_localite = l.idLocalite 
								INNER JOIN groupe g ON m.fk_groupe = g.idGroupe');

		$donnees = $reponse->fetchAll();
		$reponse->closeCursor(); 
		return $donnees;
    } 
	
	function insertMembre($Membre) { 
        
    $req = $this->bd->prepare('INSERT INTO membre(mail, nom, prenom, dateNaissance, telephone, login, motDePasse, fk_instrument, fk_adresse, fk_groupe)
					      VALUES(:mail, :nom, :$donnees, :dateNaissance, :telephone, :login, :motDePasse, :fk_instrument ,:fk_adresse, :fk_groupe)');
	$req->bindParam(':mail',$Membre['mail']);
	$req->bindParam(':nom',$Membre['nom']);
	$req->bindParam(':prenom',$Membre['prenom']);
	$req->bindParam(':dateNaissance',$Membre['dateNaissance']);
	$req->bindParam(':telephone',$Membre['telephone']);
	$req->bindParam(':login',$Membre['login']);
	$req->bindParam(':motDePasse',$Membre['motDePasse']);
	$req->bindParam(':fk_instrument',$Membre['fk_instrument']);
	$req->bindParam(':fk_adresse',$Membre['fk_adresse']);
	$req->bindParam(':fk_groupe',$Membre['fk_groupe']);
	$req->execute();
    }
	
	function updateMembre($Membre) { 
	
		$req = $this->bd->prepare('UPDATE membre SET mail="'.$Membre['mail'].'", nom="'.$Membre['nom'].'", prenom="'.$Membre['prenom'].'", dateNaissance="'.$Membre['dateNaissance'].'"
							                       telephone="'.$Membre['telephone'].'",login="'.$Membre['login'].'",motDePasse="'.$Membre['mdp'].'",fk_instrument="'.$Membre['idInstrument'].'",
												   fk_adresse="'.$Membre['adresse'].'",fk_groupe="'.$Membre['groupe'].'"
							  WHERE id='.$Membre['id']);
		$req->execute();
    } 
	function deleteMembre() { 
		$req = $this->bd->prepare('DELETE FROM membre WHERE nom ="'.$Membre['nom'].'" AND prenom = "'.$Membre['prenom'].'"');
		$req->execute();
    } 
} 





?>