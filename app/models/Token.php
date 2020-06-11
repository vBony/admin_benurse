<?php
class Token extends modelHelper{
    public function tokenGenerator(){
        $bytes = 4;
        $restult_bytes = random_bytes($bytes);
        $final_result = substr(bin2hex($restult_bytes),2);
        $SEtoken = md5($final_result);

        $date = date('d/m/y');

        $sql = 'DELETE FROM se_token';
        $sql = $this->db->query($sql);

        $sql = 'INSERT INTO se_token(code, date) VALUES (:token, :date)';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':token', $SEtoken);
        $sql->bindValue(':date', $date);
        $sql->execute();
    }

    public function tokenVerifier($token){
        $sql = "SELECT code FROM se_token";
        $sql = $this->db->query($sql);

        $token_db = $sql->fetch();
        $token_db = $token_db[0];

        if($token != $token_db){
            return false;
        }else{
            return true;
        }
    }

    public function getToken(){
        $sql = 'SELECT * FROM se_token';
        $sql = $this->db->query($sql);

        foreach($sql as $tokenData);

        return $tokenData;
    }
}