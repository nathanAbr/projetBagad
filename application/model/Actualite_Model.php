<?php 
class Actualite_Model Extends core.Model { 
    
    
    function loadActu() { 
	    $tableau = array();
	    $i = 0;
        $reponse = $bdd->query('SELECT idActualite, titre, image, description, date, m.nom, m.prenom 
								FROM actualite 
								INNER JOIN membre m ON fk_membre = m.idMembre');

		$donnees = $reponse->fetchAll();
		while ( $i < count($donnees)){
	
		$tableau = [        'id'=>$donnees[$i]['idActualite'],
							'titre'=>$donnees[$i]['titre'],
							'image'=>validerType($donnees[$i]['image']),
							'description'=>$donnees[$i]['description'], 
							'date'=>$donnees[$i]['date'],
							'creePar'=>$donnees[$i]['creePar']: 
				];
		$tableau_pour_json[$i]= $tableau;
		$i +=1;
		}
		
		var_dump($tableau_pour_json);
		$reponse->closeCursor(); 
		return json_encode($tableau_pour_json);
    } 
	
	function insertActu($Actualite) { 
       
    $req->prepare('INSERT INTO actualite(titre, image, description, date, fk_membre) VALUES(:titre, :image, :description, :date, :idMembre)');
	$req->bindParam(':titre',$Actualite['titre']);
	$req->bindParam(':image',$Actualite['image']);
	$req->bindParam(':description',$Actualite['description']);
	$req->bindParam(':date',$Actualite['date']);
	$req->bindParam(':idMembre',$Actualite['idMembre']);
	$req->execute();

		if($req){
			
			echo 'Le jeu a bien été ajouté !';
		}
    }
	
	function updateActu($Actualite) { 
	
		$req = $bdd->prepare('UPDATE actualite SET titre="'.$Actualite['titre'].'", image="'.$Actualite['image'].'",
										   description="'.$Actualite['description'].'", date="'.$Actualite['date'].'", fk_membre = "'.$Actualite['idMembre'].'"  
							  WHERE idActualite='.$Actualite['id']);
		$req->execute();
		if($req){
			echo 'Le jeu a bien été ajouté !';
		}
    } 
	function deleteActu($Actualite) { 
		$req = $bdd->prepare('DELETE FROM actualite WHERE titre ="'.$Actualite['titre'].'"');
		$req->execute();
		if($req){
			echo 'Le jeu a bien été supprimé !';
		}
    } 
} 





?>