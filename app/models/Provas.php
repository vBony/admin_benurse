<?php 
class Provas extends modelHelper{
    public function getAllMaterias(){
        $sql = "SELECT * FROM materias";
        $sql = $this->db->query($sql);
        $data = $sql->fetchAll();
        return $data;
    }

}


?>