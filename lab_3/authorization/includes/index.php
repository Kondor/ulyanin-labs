<?php
require '../includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title']; ?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="../media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="../media/css/style.css">
</head>

<body>

  <?php
  if (!empty($_SESSION['logged_user']) ) { ?>
    <!-- <li><a href="index.php">Административный интерфейс</a></li> -->
  <?php } else {
    header('Location: error.php');
  ?>

  <?php }

  ?>
  <div id="wrapper">

    <?php include '../includes/header.php'; ?>
    <!-- вставка header -->

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-10">
            <div class="block">
              <a href="#article-add-form">Добавить запись</a>
              <h3>Все записи</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?php

                    // пагинатор (след/пред страницы)
                    include "includes/paginator.php";

                    $articles = $mysql->query("SELECT * FROM `articles` ORDER BY `id` DESC LIMIT $offset, $per_page");
                    $articles_exist = true;
                    if ($articles->num_rows <= 0) 
                    {
                        echo "Статьи нет!";
                        $articles_exist = false;
                    }
                    
                  ?>

                  <?php
                    // отображение новости
                    include 'includes/print_article.php';
                  ?>

                </div>
                <?php
                if ($articles_exist) {
                  echo '<div class="paginator">';

                  if ($page > 1) {
                    echo '<a href="index.php?page=' . ($page - 1) . '">&laquo; Прошлая страница</a>  ';
                  }

                  if ($page < $total_pages) {
                    echo '<a href="index.php?page=' . ($page + 1) . '">Следующая страница &raquo;</a>';
                  }
                  echo '</div>';
                }
                ?>
              </div>
            </div>

            <div id="article-add-form" class="block">
              <!-- вставка формы добавления -->
              <?php include 'includes/article_add.php' ?>
            </div>
          </section>

          <section class="content__right col-md-4">
            <!-- вставка -->
          </section>
        </div>
      </div>
    </div>

    <!-- вставка footer -->
    <?php include '../includes/footer.php'; ?>

  </div>

</body>

</html>