<?php
require 'includes/config.php';

//unset($_SESSION['logged_user']);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title']; ?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="media/css/style.css">
</head>
<body>
    
  <div id="wrapper">

    <!-- вставка header -->
    <?php include 'includes/header.php'; ?>

    <?php
    if( !empty($_SESSION['logged_user']) )
    { 
      header("Location: admin/index.php");
    } else { ?>

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <a href="articles.php">Все записи</a>
              <h3>Последние записи</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?php
                    // запрос на выборку последних статей (4 штуки)
                    $articles = $mysql->query("SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 4");
                  ?>

                  <?php
                    include 'includes/print_article.php';
                  ?>
                </div>
              </div>
            </div>

            <div class="block">
              <a href="articles_categorie.php?categorie_id=1">Все записи</a>
              <h3>Бытовая техника [Последние записи]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">
                  
                  <?php
                    // запрос на выборку последних статей из категории 1
                    $articles = $mysql->query("SELECT * FROM `articles` WHERE `categorie_id` = 1 ORDER BY `id` DESC LIMIT 4");
                  ?>
                  
                  <?php
                    include 'includes/print_article.php';
                  ?>
                </div>
              </div>
            </div>

            <div class="block">
              <a href="articles_categorie.php?categorie_id=2">Все записи</a>
              <h3>Компьютеры [Последние записи]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?php
                    $articles = $mysql->query("SELECT * FROM `articles` WHERE `categorie_id` = 2 ORDER BY `id` DESC LIMIT 4");
                  ?>

                  <?php
                    include 'includes/print_article.php';
                  ?>
                </div>
              </div>
            </div>

            <div class="block">
              <a href="articles_categorie.php?categorie_id=3">Все записи</a>
              <h3>Гаджеты [Последние записи]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?php
                    $articles = $mysql->query("SELECT * FROM `articles` WHERE `categorie_id` = 3 ORDER BY `id` DESC LIMIT 4");
                  ?>

                  <?php
                    include 'includes/print_article.php';
                  ?>
                </div>
              </div>
            </div>

            <div class="block">
              <a href="articles_categorie.php?categorie_id=4">Все записи</a>
              <h3>Интернет [Последние записи]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?php
                    $articles = $mysql->query("SELECT * FROM `articles` WHERE `categorie_id` = 4 ORDER BY `id` DESC LIMIT 4");
                  ?>

                  <?php
                    include 'includes/print_article.php';
                  ?>
                </div>
              </div>
            </div>

            <div class="block">
              <a href="articles_categorie.php?categorie_id=5">Все записи</a>
              <h3>Программное обеспечение [Последние записи]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?php
                    $articles = $mysql->query("SELECT * FROM `articles` WHERE `categorie_id` = 5 ORDER BY `id` DESC LIMIT 5");
                  ?>

                  <?php
                    include 'includes/print_article.php';
                  ?>
                </div>
              </div>
            </div>

            <div class="block">
              <a href="articles_categorie.php?categorie_id=6">Все записи</a>
              <h3>Прочее [Последние записи]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?php
                    $articles = $mysql->query("SELECT * FROM `articles` WHERE `categorie_id` = 6 ORDER BY `id` DESC LIMIT 5");
                  ?>

                  <?php
                    include 'includes/print_article.php';
                  ?>
                </div>
              </div>
            </div>

            <!-- <div class="block">
              <a href="articles_categorie.php?categorie_id=7">Все записи</a>
              <h3>Прочее [Последние записи]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">
            
                  <?php
                    //$articles = $mysql->query("SELECT * FROM `articles` WHERE `categorie_id` = 7 ORDER BY `id` DESC LIMIT 5");
                  ?>
            
                  <?php
                    //include 'includes/print_article.php';
                  ?>
                </div>
              </div>
            </div> -->
          </section>

          <section class="content__right col-md-4">
            <!-- вставка -->
            <?php include 'includes/sidebar.php'; ?>
          </section>
        </div>
      </div>
    </div>

    <!-- вставка footer -->
    <?php include 'includes/footer.php'; ?>
  
    <?php }
    ?>
  </div>

</body>
</html>