<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 13/04/2017
 * Time: 11:28
 */

namespace application\model;


class Instruments extends \core\model\Model
{
    public function getAllInstruments(){
        $data = $this->db->query('SELECT idInstrument , nom FROM instrument');
        $result = $data->fetchAll();
        return $result;
    }
}