<?php

namespace application\model;
class News extends \core\model\Model
{
    public function getAllNews(){
        $data = $this->db->query('SELECT * FROM actualite');
        $result = $data->fetchAll();
        return $result;
    }
}
?>