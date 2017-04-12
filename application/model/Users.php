<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 12/04/2017
 * Time: 11:12
 */

namespace application\model;


class Users extends \core\model\Model
{
    public function getUser($login, $password){
        $data = $this->db->query('SELECT * FROM membre WHERE login = "'.$login.'" AND motDePasse = "'.$password.'"');
        $result = $data->fetchAll();
        return $result;
    }
}