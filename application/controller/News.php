<?php

namespace application\controller;

class News extends \core\controller\Controller
{
	
	public function show_news($message = null)
	{
		$data['message'] = $message;
		$news = new \application\model\ActualiteModel();
		$data['news'] = $news->loadActu();
		$this->loadView('news', $data);
	}

	function showForm($id=null){
		if($id===null){
			$this->loadView('addNews');
		}
		else{
			$news = new \application\model\ActualiteModel();
			$data['news'] = $news->getOnceActu($id);
			$this->loadView('addNews', $data);
		}
	}

	function create_news()
	{
		$news = new \application\model\ActualiteModel();
        $data = array();
		if(isset($_POST['valid'])){
			if(empty($_POST['titre']) || empty($_POST['description'])){
				$data['error_message'] = 'L\' un des champs n\'a pas été renseigné';
			}
			else{
				$Actualite = new \stdClass();
				$Actualite->titre = $_POST['titre'];
				$Actualite->image = $_POST['image'];
				$Actualite->description = $_POST['description'];
				$Actualite->date = date('Y-m-d h:i:s');
				$Actualite->idMembre = $_SESSION['users'][0]['idMembre'];
				$news->insertActu($Actualite);
			}
			$this->show_news($message = null);
		}
		if(isset($_POST['cancel'])){
			header('Location: index.php?pages=News&module=show_news');
		}
		
	}

	function showUpdate($id){
		$news = new \application\model\ActualiteModel();
		$data['news'] = $news->getOnceActu($id);
		$this->loadView('modifNews', $data);
	}

	function update_news($id)
	{
		$news = new \application\model\ActualiteModel();
		if(isset($_POST['valid'])){
			if(empty($_POST['titre']) || empty($_POST['description'])){
				$data['error_message'] = 'L\' un des champs n\'a pas été renseigné';
			}
			else{
				$Actualite = new \stdClass();
				$Actualite->id = $id;
				$Actualite->titre = $_POST['titre'];
				$Actualite->image = $_POST['image'];
				$Actualite->description = $_POST['description'];
				$Actualite->date = date('Y-m-d h:i:s');
				$Actualite->idMembre = $_SESSION['users'][0]['idMembre'];
				$news->updateActu($Actualite);
			}
			$this->show_news();
		}
		if(isset($_POST['cancel'])){
			header('Location: index.php?pages=News&module=show_news');
		}
	}

	function delete_news($id){

		$news = new \application\model\ActualiteModel();
		if($news->deleteActu($id)){
			$message = 'actualite supprimer';
		}
		else{
			$message = 'Une erreur c\'est produite';
		}
		$this->show_news($message);
	}
	

}


?>