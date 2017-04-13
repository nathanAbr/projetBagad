<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 13/04/2017
 * Time: 09:52
 */

namespace application\model;


class Groupe extends \core\model\Model
{
    public function getAllGroupes(){
        $data = $this->db->query('SELECT idgroupe , groupe.libelle as "nomGroupe" FROM groupe');
        $result = $data->fetchAll();
        return $result;
    }
}