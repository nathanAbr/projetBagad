<?php

namespace application\controller;

class Event extends \core\controller\Controller
{
	
	public function show_event($oui = null)
	{
		$eventModel = new \application\model\Evenement();
		if(isset($_SESSION['users'])) {
            
			$typeEvent = new \application\model\TypeEvenement();
            $data['event'] = $eventModel->loadEvent();
			$data['typeEvent'] = $typeEvent->loadType();
            $this->loadView('event', $data);
        }
        else{
            $data['error_message'] = 'Vous devez être connecté pour accèder à cette page';
            $this->loadView('login', $data, false);
        }
	}
	
	public function createEvent(){
		$eventModel = new \application\model\Evenement();
		$data = Array();
		if(isset($_SESSION['users'])) {
            
		$Event= new \stdClass();
		$infosEvent;
		$infosAdresse;
		$infosLocalite;
		if(isset($_POST['rue1Event']) && isset($_POST['rue2Event']) && isset($_POST['villeEvent'])&&
			isset($_POST['cpEvent'])&& isset($_POST['paysEvent'])){
			$infosAdresse = new \stdClass();
			$infosLocalite = new \stdClass();
									$infosAdresse->rue1 = $_POST['rue1Event'];
									$infosAdresse->rue2 = $_POST['rue2Event'];
									$infosAdresse->complement = $_POST['complementEvent'];
									$infosLocalite->ville = $_POST['villeEvent'];
									$infosLocalite->codePostale = $_POST['cpEvent'];
									$infosLocalite->pays = $_POST['paysEvent'];
									
									
				$modelLocalite = new \application\model\Localite();
				$modelAdresse = new \application\model\Adresse();
				$infosAdresse->localite = $modelLocalite->insertLocalite($infosLocalite);
				$Event->idAdresse = $modelAdresse->insertAdresse($infosAdresse);
			}

			$infosReferent;
		if(isset($_POST['nomRefEvent']) && isset($_POST['prenomRefEvent']) && isset($_POST['telRefEvent'])&&
			isset($_POST['mailRefEvent'])){
			$infosReferent = new \stdClass();
									$infosReferent->nom =  $_POST['nomRefEvent'];
									$infosReferent->prenom = $_POST['prenomRefEvent'];
									$infosReferent->tel = $_POST['telRefEvent'];
									$infosReferent->mail = $_POST['mailRefEvent'];
									
				$modelRef = new \application\model\ReferentExterieur();
				$Event->idReferent = $modelRef->insertReferent($infosReferent);
			}
		
		if(isset($_POST['typeEvent'])){
			$Event->idType = $_POST['typeEvent'];
		}
	    if(isset($_SESSION['users'][0]['idMembre'])){
			$Event->idCreateur = $_SESSION['users'][0]['idMembre'];
		}
		
		if(isset($_POST['nomEvent']) && isset($_POST['debutEvent']) && isset($_POST['finEvent'])&&
			isset($_POST['cachetEvent'])&& isset($_POST['descriptionEvent'])){
									$Event->nom = $_POST['nomEvent'];
									$Event->dateDebut = $_POST['debutEvent'];
									$Event->dateFin = $_POST['finEvent'];
								    $Event->cachet = $_POST['cachetEvent'];
									$Event->image = $_POST['imageEvent'];
									$Event->valide = '0';
									$Event->decription = $_POST['descriptionEvent'];
			}
			
			if($eventModel->insertEvent($Event)){
                $data['success'] = 'L\'évenement '.$Event->nom.' à bien été ajouté';
            }
            $this->show_event();
		}	
	}
	public function deleteEvent()
	{
		$eventModel = new \application\model\Evenement();
		$Event= new \stdClass();
		if(isset($_POST['idEvent'])){
			$Event->idEvent = $_POST['idEvent'];
		}
		if($eventModel->deleteEvent($Event)){
                $data['success'] = 'L\'évenement a bien été supprimé';
            }
		$this->show_event();
	}

	public function update_event()
	{
		$eventModel = new \application\model\Evenement();
		$data = Array();
		if(isset($_SESSION['users'])) {
		$Event= new \stdClass();
		$infosEvent;
		$infosAdresse;
		$infosLocalite;
		if(isset($_POST['rue1Event']) && isset($_POST['rue2Event']) && isset($_POST['villeEvent'])&&
			isset($_POST['cpEvent'])&& isset($_POST['paysEvent'])){
			$infosAdresse = new \stdClass();
			$infosLocalite = new \stdClass();
									$infosAdresse->rue1 = $_POST['rue1Event'];
									$infosAdresse->rue2 = $_POST['rue2Event'];
									$infosAdresse->complement = $_POST['complementEvent'];
									$infosLocalite->ville = $_POST['villeEvent'];
									$infosLocalite->codePostale = $_POST['cpEvent'];
									$infosLocalite->pays = $_POST['paysEvent'];
									
									
				$modelLocalite = new \application\model\Localite();
				$modelAdresse = new \application\model\Adresse();
				$infosAdresse->localite = $modelLocalite->insertLocalite($infosLocalite);
				$Event->idAdresse = $modelAdresse->insertAdresse($infosAdresse);
			}

			$infosReferent;
		if(isset($_POST['nomRefEvent']) && isset($_POST['prenomRefEvent']) && isset($_POST['telRefEvent'])&&
			isset($_POST['mailRefEvent'])){
			$infosReferent = new \stdClass();
									$infosReferent->nom =  $_POST['nomRefEvent'];
									$infosReferent->prenom = $_POST['prenomRefEvent'];
									$infosReferent->tel = $_POST['telRefEvent'];
									$infosReferent->mail = $_POST['mailRefEvent'];
									
				$modelRef = new \application\model\ReferentExterieur();
				$Event->idReferent = $modelRef->insertReferent($infosReferent);
			}
		
		if(isset($_POST['typeEvent'])){
			$Event->idType = $_POST['typeEvent'];
		}
	    if(isset($_SESSION['users'][0]['idMembre'])){
			$Event->idCreateur = $_SESSION['users'][0]['idMembre'];
		}
		
		if(isset($_POST['nomEvent']) && isset($_POST['debutEvent']) && isset($_POST['finEvent'])&&
			isset($_POST['cachetEvent'])&& isset($_POST['descriptionEvent'])){
									$Event->nom = $_POST['nomEvent'];
									$Event->dateDebut = $_POST['debutEvent'];
									$Event->dateFin = $_POST['finEvent'];
								    $Event->cachet = $_POST['cachetEvent'];
									$Event->image = $_POST['imageEvent'];
									$Event->valide = '0';
									$Event->decription = $_POST['descriptionEvent'];
			}
			
			if($eventModel->insertEvent($Event)){
                $data['success'] = 'L\'évenement '.$Event->nom.' à bien été ajouté';
            }
            $this->show_event();
		}	
	}
	
	

}

?>

