<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 12/04/2017
 * Time: 13:50
 */

namespace application\controller;


class Membres extends \core\controller\Controller
{
    public function __construct(){
        $this->loadView('membres');
    }
}