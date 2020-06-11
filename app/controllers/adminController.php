<?php
class adminController extends controllerHelper{
    public function login(){
        $data = array();

        $this->loadView('admin_login', $data);
    }

    public function register(){
        $data = array();

        $this->loadView('admin_register', $data);
    }
}