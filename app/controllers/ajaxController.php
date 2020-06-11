<?php
class ajaxController extends controllerHelper{
    public function register(){
        $adminOperator = new Admin();
        $tokenOperator = new Token();

        if(isset($_POST) && !empty($_POST)){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $token = $_POST['setoken'];
        }

        if(!strstr($email, '@') && !strstr($email, '.') && strlen($email) < 13){
            echo "inputerror";
        }elseif(strlen($name) < 6 && !strstr($name, ' ')){
            echo "inputerror";
        }elseif(strlen($password) < 6){
            echo "inputerror";
        }elseif(strlen($token) != 32){
            echo "inputerror";
        }else{
            if($tokenOperator->tokenVerifier($token) == true){
                $ip = $adminOperator->getAdminIp();

                if($adminOperator->emailVerifier($email) == true){
                    echo 'emailexists';
                }else{
                    $adminOperator->registerAdmin($name, $email, $password, $token, $ip);
                    echo 'done';
                }

            }else{
                echo "wrongtoken";
            }
        }
    }

    public function login(){
        $adminOperator = new Admin();

        if(isset($_POST) && !empty($_POST)){
            $email = $_POST['email'];
            $password = md5($_POST['password']);
        }

        if(!strstr($email, '@') && !strstr($email, '.') && strlen($email) < 13){
            echo "inputerror";
        }elseif(strlen($password) < 6){
            echo "inputerror";
        }else{
            if($adminOperator->signin($email, $password) == false){
                echo "wronglogin";
            }else{
                $admindata = $adminOperator->signin($email, $password);
                $_SESSION['user_id'] = $admindata[0]['id'];
                echo 'done';
            }
        }
    }
}