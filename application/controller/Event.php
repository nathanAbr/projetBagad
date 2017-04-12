<?php

namespace application\controller;

class Event extends \core\controller\Controller
{
	
	public function show_event()
	{
		if(isset($_SESSION['users'])) {
            $event = new \application\model\Evenement();
            $data['event'] = $event->loadEvent();
            $this->loadView('event', $data);
        }
        else{
            $data['error_message'] = 'Vous devez être connecté pour accèder à cette page';
            $this->loadView('login', $data, false);
        }
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

