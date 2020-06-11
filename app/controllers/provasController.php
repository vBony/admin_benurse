<?php
class provasController extends controllerHelper{
    public function index(){
        $data = array();

        $adminOperator = new Admin();
        $provasOperator = new Provas();

        $firstName = $adminOperator->getAllData($_SESSION['user_id']);
        $firstName = $firstName['name'];
        $firstName = explode(' ', $firstName);
        $firstName = $firstName[0];

        $data = array();
        $data['adminData'] = $adminOperator->getAllData($_SESSION['user_id']);
        $data['firstName'] = $firstName;
        $data['js'] = 'provas.js';
        $data['css'] = 'provas.css';
        $data['materias'] = $provasOperator->getAllMaterias();
        $this->loadTemplate('provas', $data);
    }
}