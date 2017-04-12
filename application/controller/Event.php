<?php


namespace application\controller;

class Event extends \core\controller\Controller
{
	
	public function show_event()
	{
		$event = new \application\model\Event();
        $data['event'] = $event->getAllEvent();
        $this->loadView('event', $data);
	}

	public function create_event()
	{
		$event = new \application\model\NewEvent();
		$data['event'] = $event->getNewEvent();
		$this->loadView('new_event', $data);
	}
/*
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

