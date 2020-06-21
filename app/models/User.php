<?php
class User extends modelHelper{
    public function getCountUsers(){
        //MUDAR QUANDO O SITE ESTIVER PRONTO
        $sql = 'SELECT COUNT(*) as contagem FROM pre_reg_emails';
        $sql = $this->db->query($sql);
        $data = $sql->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
}