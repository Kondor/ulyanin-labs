<header id="header">
    <div class="header__top">
        <div class="container">
            <div class="header__top__logo">
                <h1><?php echo $config['title']; ?></h1>
                <h3>Date: <?php echo date("F d, Y h:i:s A"); ?></h3>
            </div>
            <nav class="header__top__menu">
                <ul>
                    <li><a href="./index.php">Главная</a></li>
                    <li><a href="#">Обо мне</a></li>
                    <li><a href="#">Я Вконтакте</a></li>
                </ul>
            </nav>
        </div>
    </div>
    
    <div class="header__bottom" style="text-align: center; border-top: 2px solid white; border-bottom: 2px solid white;">
        <div class="container">
            <nav>
                <ul>          
                <?php
                    if( isset($_SESSION['logged_user']) )
                    { 
                    ?>
                    
                    <li><a href="../admin/index.php">Главная страница</a></li>
                    <li><a href="../admin/index.php">Административный интерфейс</a></li>
                    <li><a href="../authorization/logout.php">Выйти</a></li>
                    <?php } else { ?>
                        <li><a href="index.php">Главная страница</a></li>
                        <li><a href="authorization/login.php">Авторизация</a></li>
                   <?php }
                ?>     
                </ul>
            </nav>
        </div>
    </div>
    
    <?php
        $categories_q = $mysql->query("SELECT * FROM `articles_categories`");
        $categories = array();
        
        while( $categ = $categories_q->fetch_assoc() )
        {
            $categories[] = $categ;
        }
    ?>
    <div class="header__bottom">
        <div class="container">
            <nav>
                <ul>
                <?php if( isset($_SESSION['logged_user']) )
                    { ?>
                    <li><a href="index.php">Все</a></li>
                    <?php 
                      foreach( $categories as $categ)
                      {
                        ?>
                        <li><a href="../admin/articles_categorie_admin.php?categorie_id=<?php echo $categ['id']; ?>"><?php echo $categ['title']; ?></a></li>
                        <?php
                      }
                    ?>

                    <?php } else { ?>

                    <li><a href="articles.php">Все</a></li>
                    <?php 
                      foreach( $categories as $categ)
                      {
                        ?>
                        <li><a href="articles_categorie.php?categorie_id=<?php echo $categ['id']; ?>"><?php echo $categ['title']; ?></a></li>
                        <?php
                      }
                    ?>
                    <?php } 
                    ?>
                </ul>
          </nav>
        </div>
    </div>
</header>