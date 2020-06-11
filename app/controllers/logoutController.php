<?php
class logoutController extends controllerHelper{
    public function index(){
        if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
            session_destroy();
            header('Location: '.BASE_URL);
        }else{
            header('Location: '.BASE_URL);
        }
    }
}