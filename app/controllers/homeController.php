<?php
class homeController extends controllerHelper{
    public function index(){
        if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
            header('Location: '.BASE_URL.'admin/login');
        }else{
            //Para mudar o Token todos os dias
            $tokenOperator = new Token();
            $tokenDate = $tokenOperator->getToken();
            $nowDate = date('d/m/y');

            if($tokenDate != $nowDate){
                $tokenOperator->tokenGenerator();
            }

            $adminOperator = new Admin();

            $firstName = $adminOperator->getAllData($_SESSION['user_id']);
            $firstName = $firstName['name'];
            $firstName = explode(' ', $firstName);
            $firstName = $firstName[0];

            $data = array();
            $data['adminData'] = $adminOperator->getAllData($_SESSION['user_id']);
            $data['firstName'] = $firstName;
            $data['token'] = $tokenOperator->getToken();
            $data['js'] = 'home.js';
            $data['css'] = 'home.css';

            $this->loadTemplate('home', $data);
        }
    }

    public function home(){
        if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
            header('Location: '.BASE_URL.'admin/login');
        }else{
            //Para mudar o Token todos os dias
            $tokenOperator = new Token();
            $tokenDate = $tokenOperator->getToken();
            $nowDate = date('d/m/y');

            if($tokenDate != $nowDate){
                $tokenOperator->tokenGenerator();
            }

            
            $adminOperator = new Admin();

            $data = array();
            $data['adminData'] = $adminOperator->getAllData($_SESSION['user_id']);
            $data['js'] = 'home.js';
            $data['css'] = 'home.css';

            $this->loadTemplate('home', $data);
        }
    }
}