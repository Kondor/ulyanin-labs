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

        <div id="content">
            <div class="container">
                <div class="row">
                    <section class="content__left col-md-8">
                        <div class="block">
                            <h3>Все записи</h3>
                            <form name="sort" method='post' action="articles_categorie.php?categorie_id=<?php echo (int)$_GET['categorie_id']; ?>">
                                <select name="order">
                                    <option value="chooseAll">Все</option>
                                    <option value="chooseASC">По возрастанию</option>
                                    <option value="chooseDESC">По убыванию</option>
                                </select>
                                <input type="submit" value="Сортировка" />
                            </form>
                            <div class="block__content">
                                <div class="articles articles__horizontal">

                                    <?php
                                        include 'includes/paginator.php';

                                        $articles = $mysql->query("SELECT * FROM `articles` WHERE `categorie_id` = " . (int) $_GET['categorie_id'] . " ORDER BY `id` DESC LIMIT $offset, $per_page");
                                        $articles_exist = true;
                                        if ($articles->num_rows <= 0) {
                                            echo "Статьи нет!";
                                            $articles_exist = false;
                                        }
                                    ?>
                                    
                                    <?php
                                        $sort = $_POST['order'];
                                        //var_dump($sort);
                                        if (!empty($sort)) {
                                            if ($sort == 'chooseASC') {
                                                $articles = $mysql->query("SELECT * FROM `articles` WHERE `categorie_id` = " . (int) $_GET['categorie_id'] . " ORDER BY `id` ASC LIMIT $offset, $per_page");
                                            } else if ($sort == 'chooseDESC') {
                                                $articles = $mysql->query("SELECT * FROM `articles` WHERE `categorie_id` = " . (int) $_GET['categorie_id'] . " ORDER BY `id` DESC LIMIT $offset, $per_page");
                                            }
                                        }
                                    ?>

                                    <?php
                                       include 'includes/print_article.php';
                                    ?>

                                </div>
                                <?php
                                    if ($articles_exist) {
                                        echo '<div class="paginator">';

                                        if ($page > 1) {
                                            echo '<a href="articles_categorie.php?page=' . ($page - 1) . '">&laquo; Прошлая страница</a>  ';
                                        }

                                        if ($page < $total_pages & $page > 1) {
                                            echo '<a href="articles_categorie.php?page=' . ($page + 1) . '">Следующая страница &raquo;</a>';
                                        }
                                        echo '</div>';
                                    }
                                ?>
                            </div>
                        </div>
                    </section>

                    <section class="content__right col-md-4">
                        <!-- вставка sidebar-->
                        <?php include 'includes/sidebar.php'; ?>
                    </section>
                </div>
            </div>
        </div>

        <!-- вставка footer-->
        <?php include 'includes/footer.php'; ?>

    </div>

</body>

</html>