<?php
  require '../includes/config.php';
  if(session_destroy())
  {
    header("Location: ../index.php");
  }
  //unset($_SESSION['logged_user']);
  // unset($_SESSION['login']);
  // unset($_SESSION['password']);
  //header('Location: ../index.php');
?>

<?php
  // //Если переменная auth из сессии не пуста и равна true, то...
  // if (!empty($_SESSION['auth']) and ($_SESSION['auth']) ) {
  //   session_start();
  //   session_destroy(); //разрушаем сессию для пользователя

  //   //Удаляем куки авторизации путем установления времени их жизни на текущий момент:
  //   setcookie('login', '', time()); //удаляем логин
  //   setcookie('password', '', time()); //удаляем ключ
  //   header('Location: ../index.php');
  // }
?>