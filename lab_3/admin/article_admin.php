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

  <div id="wrapper">

    <?php include '../includes/header.php'; ?>

    <?php
      $article = $mysql->query("SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);

      if ($article->num_rows <= 0) {
      ?>
        <div id="content">

        <?php
      } else {
        $art = $article->fetch_assoc();
        ?>

        <div id="content">
          <div class="container">
            <div class="row">
              <section class="content__left col-md-8">
                <div class="block">
                  <a><?php echo 'Просмотров: ' . $art['views']; ?></a>
                  <h2><?php echo $art['title']; ?></h2>
                  <br>
                  <p><small>Дата: <?php echo $art['pubdate']; ?></small>
                  <p>
                  <div class="block__content">
                    <img style="width:100%" src="static/images/<?php echo $art['image']; ?>">
                    <div class="full-text"><?php echo $art['text']; ?></div>
                  </div>
                </div>
            

            <?php
              // удаление статьи
              include 'includes/article_delete.php';
            ?>

            <!-- <h3>Редактирование</h3> -->
            <div class="block__content">
              <div class="form__group form">
                <div class="row">
                  <div class="col-md-4">
                    <a href="#article-edit-form">
                      <input type="submit" class="form__control" name="" value="Редактировать">
                    </a>
                  </div>

                  <form class="form" method="POST" action="article_admin.php?id=<?php echo $art['id']; ?>" enctype="multipart/form-data">
                    <div class="col-md-4">
                      <a href="index.php">
                        <input type="submit" class="form__control" name="delete_post" value="Удалить">
                      </a>
                    </div>
                  </form>

                </div>
              </div>
              <div class="form__group">
                <div class="row">
                </div>
              </div>
            </div>

            <?php
              // редактирование статьи
              include 'includes/article_edit.php';
            ?>

            </section>

          </div>
        </div>
      </div>


    <?php
    }
    ?>
    <!-- вставка footer -->
    <?php include '../includes/footer.php' ?>
  
  </div>

</body>

</html>