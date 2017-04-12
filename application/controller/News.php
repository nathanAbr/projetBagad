<?php

namespace application\controller;

class News extends \core\controller\Controller
{
	
	public function show_news()
	{
		$news = new \application\model\ActualiteModel();
		$data['news'] = $news->loadActu();
		$this->loadView('news', $data);
	}
	/*function create_news()
	{
		# code...
	}
	function update_news()
	{
		# code...
	}
	function delete_news(){
		# code...
	}*/
	

}


?>