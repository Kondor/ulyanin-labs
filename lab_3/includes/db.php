<? session_start(); ?>
<?php

require_once "config.php";

// подключение/mysql для xampp
$mysql = new mysqli(
    $config['db']['server'],
    $config['db']['username'],
    $config['db']['password'],
    $config['db']['name']
); 

// старт сессии
// $expire = 365*24*3600; // We choose a one year duration

// ini_set('session.gc_maxlifetime', $expire);

// session_start(); //We start the session 
// $expire = 365*24*3600; // We choose a one year duration
// ini_set('session.gc_maxlifetime', $expire);
// session_start(); //We start the session 
// setcookie(session_name(),session_id(),time()+$expire); 
// setcookie(session_name(),session_id(),time()+$expire); 
//session_start();
?>