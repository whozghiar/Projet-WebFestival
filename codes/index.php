<?php
session_start();
require '../includes/flight/flight/Flight.php';
require 'routes.php';
require '../includes/Smarty/libs/Smarty.class.php'; 
require '../includes/pdo.php';

Flight::register('view', 'Smarty', array(), function($smarty){
    $smarty->template_dir = './templates/';
    $smarty->compile_dir = './templates_c/';
    $smarty->config_dir = './config/';
    $smarty->cache_dir = './cache/';
   });
   Flight::map('render', function($template, $data){
    Flight::view()->assign($data);
    Flight::view()->display($template);
   }); 
   
Flight::set("db",$db);

if(isset($_SESSION['user'])){
    Flight::view() -> assign('user',$_SESSION['user']);
    Flight::view() -> assign('candidat',$_SESSION['candidat']);
}

Flight::start();

?>