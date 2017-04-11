<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 11/04/2017
 * Time: 14:07
 */

namespace application\controller;


class Event extends \core\controller\Controller
{
    public function __construct()
    {
        $event = new \application\model\Event();
        $data['event'] = $event->getAllEvent();
        $this->loadView('event', $data);
    }
}