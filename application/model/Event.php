<?php

/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 11/04/2017
 * Time: 14:03
 */
namespace application\model;
class Event extends \core\model\Model
{
    public function getAllEvent(){
        $data = $this->db->query('SELECT * FROM evenement');
        $result = $data->fetchAll();
        return $result;
    }
}
?>