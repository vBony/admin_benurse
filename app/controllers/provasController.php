<?php
class provasController extends controllerHelper{
    public function index(){
        $data = array();

        $adminOperator = new Admin();
        $provasOperator = new Provas();
        $specialtiesOperator = new Specialties();
        $tokenOperator = new Token();

        $firstName = $adminOperator->getAllData($_SESSION['user_id']);

        $data = array();
        $data['adminData'] = $adminOperator->getAllData($_SESSION['user_id']);
        $data['js'] = 'provas.js';
        $data['css'] = 'provas.css';
        $data['last_questoes'] = $provasOperator->getLast5Questoes();
        $data['provas'] = $provasOperator->getAllProvas();
        $data['especialties'] = $specialtiesOperator->getAllSpecialties();
        $data['token'] = $tokenOperator->getToken();
        $this->loadTemplate('provas', $data);
    }
}