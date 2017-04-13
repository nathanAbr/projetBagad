<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 13/04/2017
 * Time: 10:19
 */

namespace application\model;


class Role extends \core\model\Model
{
    public function getAllRoles(){
        $data = $this->db->query('SELECT idRole , libelle FROM role');
        $result = $data->fetchAll();
        return $result;
    }
}