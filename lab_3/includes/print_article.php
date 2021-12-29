<?php
    // извлекаем массив данных
    while ($art = $articles->fetch_assoc()) {
    ?>
        <article class="article">
            <div class="article__image" style="background-image: url(./admin/static/images/<?php echo $art['image']; ?>);"></div>
            <div class="article__info">
                <a href="article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
                <div class="article__info__meta">
                    <?php
                    // проверка на внешний ключ(id статьи с id категории)
                    $art_categ = false;
                    foreach ($categories as $categ) {
                        if ($categ['id'] == $art['categorie_id']) {
                            $art_categ = $categ;
                            break;
                        }
                    }
                    ?>
                    <small>Категория: <a href="articles.php?categorie_id=<?php echo $art_categ['id']; ?>"><?php echo $art_categ['title']; ?></a></small>
                </div>
                <div class="article__info__preview"><?php echo mb_substr(strip_tags($art['text']), 0, 100) . ' ...' ?></div>
                <div class="article__info__meta">
                    <br>
                    <small><?php echo $art['pubdate']; ?></small>
                </div>
            </div>
        </article>
    <?php
    }
?>