<?php
require "enviroment.php";

$data = array();
if(ENVIROMENT == 'development'){
    define('BASE_URL', 'http://localhost/adminsouenfermagem/');
    $data['host'] = 'localhost';
    $data['db_name'] = 'benurse';
    $data['user_db'] = 'root';
    $data['user_pass_db'] = '';
}else{
    define('BASE_URL', 'http://');
    $data['host'] = '';
    $data['db_name'] = '';
    $data['user_db'] = '';
    $data['user_pass_db'] = '';
}

global $db;
try{
    $db = new PDO('mysql:dbname='.$data['db_name'].';host='.$data['host'], $data['user_db'], $data['user_pass_db']);
}catch(PDOException $e){
    echo "Error: ".$e->getMessage();
    exit;
}