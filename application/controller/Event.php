<?php


namespace application\controller;

class Event extends \core\controller\Controller
{
	
	public function show_event()
	{
		/*$event = new Event_model();
		$data['event'] = $event->getAllEvent();*/
		$data['title']='titre';
		$this->loadView('event', $data);
	}

	/*public function create_event()
	{
		$event->createEvent($data);
		$this->loadView('new_event', $data);
	}

	public function update_event(id)
	{
		$data['event']='';
		$this->loadView('update_event', $data);
	}

	public function delete_event(id)
	{
		$data['event'] = '';
		$this->loadView('delete_event',$data);
	}*/

}


?>


