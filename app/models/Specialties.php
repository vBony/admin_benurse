<?php
class Specialties extends modelHelper{
    public function getAllSpecialties(){
        $sql = "SELECT * FROM specialties";
        $sql = $this->db->query($sql);
        $dados = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    }
}