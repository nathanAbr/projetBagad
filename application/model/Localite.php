<?php 
namespace application\model;

class Localite Extends \core\model\Model {
    
    
    function loadLocalite() {
	    $tableau = array();
	    $i = 0;
        $reponse = $this->db->query('SELECT idLocalite, ville, pays, codePostale
						       FROM localite');

		$donnees = $reponse->fetchAll();
		$reponse->closeCursor(); 
		return $donnees;
    }

    function insertLocalite($Localite) {
        $localites = $this->loadLocalite();
        $valide = true;
        foreach ($localites as $localite){
            if($localite['pays'] == $Localite->pays && $localite['ville'] == $Localite->ville && $localite['codePostale'] == $Localite->codePostale){
                $result[0][0] = $localite['idLocalite'];
                $valide = false;
                break;
            }
        }
        if($valide){
            $req = $this->db->prepare('INSERT INTO localite(ville, pays, codePostale)
					         VALUES(:ville, :pays, :codePostale)');
            $req->bindParam(':ville',$Localite->ville);
            $req->bindParam(':pays',$Localite->pays);
            $req->bindParam(':codePostale',$Localite->codePostale);
            $req->execute();
            $req = $this->db->query('SELECT LAST_INSERT_ID() FROM localite');
            $result = $req->fetchAll();
        }
        return $result;
    }

    function updateLocalite($Localite) {

        $req = $this->db->prepare('UPDATE localite SET ville="'.$Localite['ville'].'", pays="'.$Localite['pays'].'", codePostale="'.$Localite['cp'].'"
							  WHERE idLocalite="'.$Localite['id'].'"');
        $req->execute();
    }
    function deleteLocalite($Localite) {
        $req = $this->db->prepare('DELETE FROM localite WHERE idLocalite ="'.$Localite['id'].'"');
        $req->execute();
    }
} 





?>