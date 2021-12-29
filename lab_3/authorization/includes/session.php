<?php
require '../includes/config.php';
session_start();

if (isset($_POST['do_log'])) {  
  
  $errors = array();
  if (trim($_POST['login']) == '') {
    $errors[] = 'Введите логин';
  }

  if (trim($_POST['password']) == '') {
    $errors[] = 'Введите пароль';
  }

  if (!empty($errors)) 
  {
    echo '<div style="color:red;">' . array_shift($errors) . '</div><hr>';
  }
  else
  {
   
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    $users = $mysql->query("SELECT * FROM `users` 
    WHERE `login` = " . "'" . $login . "'" . 
    " AND `password` = " . "'" . $password . "'");
    
    $user = $users->fetch_assoc();

    if( $user )
    {
      $_SESSION['logged_user'] = $user;
      // $_SESSION['id'] = $user['id']; 
		  // $_SESSION['login'] = $user['login'];
      // $_SESSION['auth'] = true;
      
      header("Location: ../admin/index.php");
    } else {
      echo '<div style="color:red;">' . 'Пользователя не существует!' . '</div><hr>';
    }


    
    }
        
  }

?>