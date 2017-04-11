<?php

namespace application\controller;

class News extends \core\controller\Controller
{
	
	public function show_news()
	{
		/*$news = new News_model();
		$data['news'] = $news->getAllNews();*/
		$data['title']='News';
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