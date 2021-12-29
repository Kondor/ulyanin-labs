<?php

/* Задаём общие настройки выполнения серверных скриптов */

# Режим работы
set_time_limit (10);
error_reporting (E_ALL);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
ignore_user_abort (false); 

# title => название новостного блока
# db => подключение 

$config = array(
    'title' => 'Artem Ulianin',
    
     'db' => array(
        'server' => 'localhost',
        'username' => 'c917632p_wp1',
        'password' => '1Nw8fWe9yuq9c14',
        'name' => 'c917632p_wp1'
    ) 
    
);

require "db.php";

?>