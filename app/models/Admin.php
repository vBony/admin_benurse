<?php
class Admin extends modelHelper{

    public function getAllData($id){
        $sql = 'SELECT * FROM admins WHERE id = :id';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        foreach($sql as $dados);

        return $dados;
    }

    public function registerAdmin($name, $email, $password, $token, $ip){
        $name = ucwords(strtolower($name));

        $first_name = explode(' ', $name);
        $first_name = $first_name[0];   

        $email = strtolower($email);
        $password = md5($password);
        $securityCode = $this->securityCodeGenerator();
        $admin_hierarchy = 'normal';
        $first_connection = '1';
        $admin_ip = $ip;

        


        $sql = "INSERT INTO admins(name, first_name, email, senha, last_ip_connection, security_code, admin_hierarchy, first_connection)
                VALUES (:name, :first_name, :email, :senha, :ip, :sc, :adminhi, :fc)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':name', $name);
        $sql->bindValue(':first_name', $first_name);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $password);
        $sql->bindValue(':ip', $admin_ip);
        $sql->bindValue(':sc', $securityCode);
        $sql->bindValue(':adminhi', $admin_hierarchy);
        $sql->bindValue(':fc', $first_connection);
        $sql->execute();

        return true;
    }

    private function securityCodeGenerator(){
        $bytes = 4;
        $restult_bytes = random_bytes($bytes);
        $final_result = substr(bin2hex($restult_bytes),2);
        $codeFull = md5($final_result);
        $code = substr($codeFull, 26);
        return $code;
    }

    public function getAdminIp(){
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function emailVerifier($email){
        $sql = 'SELECT email FROM admins WHERE email = :email';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function signin($email, $password){
        $sql = 'SELECT * FROM admins WHERE email = :email AND senha = :password';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', $password);
        $sql->execute();

        if($sql->rowCount() > 0){
            $admindata = $sql->fetchAll();
            return $admindata;
        }else{
            return false;
        }

    }
}