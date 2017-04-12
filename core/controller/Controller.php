<?php

/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 11/04/2017
 * Time: 11:35
 */
namespace core\controller;

class Controller
{
    protected function loadView($file, $data = array(), $template=true){
        $content_file = 'application/view/'.$file.'.php';
        $myKey = array_keys($data);
        foreach($myKey as $key => $myData){
            $$myData = $data[$myData];
        }
        if($template) {
            include_once('application/view/templates/header.php');
        }
        include_once($content_file);
        if($template) {
            include_once('application/view/templates/footer.php');
        }
    }
}