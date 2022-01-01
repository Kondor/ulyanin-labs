<?php require __DIR__ . '/config.php';?>

<link rel="stylesheet" type="text/css" href="main.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="container">
  
 <!-- <div class="demo-flex-spacer"></div> -->

  <!-- <div class="demo-flex-spacer"></div> -->
  <h1 class="demo">Artem Ulianin</h1>
  <a class="demo" href="http://c917632p.beget.tech/" title="Сайт">Ccылка на Артема</a>
  <a class="demo" href="http://c917632p.beget.tech/lab_4">Очистить</a>

  <form method="post" action="index.php">
  <div class="webflow-style-input">
    <input class="" type="text" name='text' placeholder="Введите url">
    <input class="icon ion-android-arrow-forward" name="but" type="submit">
  </div>
  </form>

    <div style="margin:10px auto;">
    <?php
    // set_time_limit(60);
      require_once './crawler.php';

      getAllLink($_POST['text']);  
    ?>

    </div>
    <div style="padding-top: 0px; margin-bottom:100px;"></div>
</div>

