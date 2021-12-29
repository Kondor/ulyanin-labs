<?php
require 'includes/config.php';
//unset($_SESSION['logged_user']);
?>

<!DOCTYPE html>
<html lang="en">

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
        $article = $mysql->query("SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);

        if ($article->num_rows <= 0) {
        ?>
            <div id="content">
                <div class="container">
                    <div class="row">
                        <section class="content__left col-md-8">
                            <div class="block">
                                <h3>Пустая страница</h3>
                            </div>
                        </section>
                        <section class="content__right col-md-4">
                            <!-- вставка -->
                            <?php include 'includes/sidebar.php'; ?>
                        </section>
                    </div>
                </div>
            </div>
        <?php
        } else {
            // просмотры статьи
            $art = $article->fetch_assoc();
            $mysql->query("UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = " . (int) $_GET['id']);
        ?>

            <div id="content">
                <div class="container">
                    <div class="row">
                        <section class="content__left col-md-8">
                            <div class="block">
                                <a><?php echo 'Просмотров: ' . $art['views']; ?></a>
                                <h3><?php echo $art['title']; ?></h3>
                                <div class="block__content">
                                    <img style="width:100%" src="admin/static/images/<?php echo $art['image']; ?>">
                                    <div class="full-text"><?php echo $art['text']; ?></div>
                                </div>
                            </div>

                            <div class="block">
                                
                                <a href="#comment-add-form">Добавить свой</a>
                                <h3>Комментарии</h3>
                                <div class="block__content">
                                    <div class="articles articles__vertical">
                                        <?php
                                            $comments = $mysql->query("SELECT * FROM `comments` WHERE `articles_id` = " . (int) $art['id'] . " ORDER BY `id` DESC");

                                            if ($comments->num_rows <= 0) {
                                                echo "Нет комментариев";
                                            }

                                            while ($comment = $comments->fetch_assoc()) { ?>

                                            <article class="article">
                                                <div class="article__image" style="background-image: url(admin/static/images/<?php echo $art['image']; ?>);"></div>
                                                <div class="article__info">
                                                    <a href="article.php?id=<?php echo $comment['articles_id']; ?>"><?php echo $comment['nickname']; ?></a>
                                                    <div class="article__info__meta"></div>
                                                    <div class="article__info__preview"><?php echo $comment['text']; ?></div>
                                                </div>
                                            </article>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div id="comment-add-form" class="block">
                                <!-- вставка формы добавления комментария-->
                               <?php include 'includes/comment_add.php'; ?>
                            </div>
                        </section>

                        <section class="content__right col-md-4">
                            <!-- вставка sidebar-->
                            <?php include 'includes/sidebar.php'; ?>
                        </section>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        <!-- вставка footer-->
        <?php include 'includes/footer.php' ?>

    </div>

</body>
</html>