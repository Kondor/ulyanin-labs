<?php if( isset($_SESSION['logged_user']) )
                      { ?> 
                      <div style="margin-bottom: 600px;"></div>
                      <?php } else { ?>
<div class="block">
  <h3>Топ читаемых статей</h3>
  <div class="block__content">
    <div class="articles articles__vertical">

      <?php
        $articles = $mysql->query("SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 5");
      ?>

      <?php
        while ($art = $articles->fetch_assoc()) {
      ?>
        <article class="article">
          <div class="article__image" style="background-image: url(admin/static/images/<?php echo $art['image']; ?>);"></div>
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
    </div>
  </div>
</div>

<div class="block">
  <h3>Комментарии</h3>
  <div class="block__content">
    <div class="articles articles__vertical">

      <?php
        $comments = $mysql->query("SELECT * FROM `comments` ORDER BY `id` DESC LIMIT 5");
      ?>

      <?php
        while ($comment = $comments->fetch_assoc()) {
      ?>
        <article class="article">
          <div class="article__image" style="background-image: url(media/static/images/comment-sait.jpg); "></div>
          <div class="article__info">
            <a href="article.php?id=<?php echo $comment['articles_id']; ?>"><?php echo $comment['nickname']; ?></a>
            <div class="article__info__meta">

            </div>
            <div class="article__info__preview"><?php echo mb_substr(strip_tags($comment['text']), 0, 100) . ' ...' ?></div>
            <div class="article__info__meta">
              <br>
              <small><?php echo $comment['pubdate']; ?></small>
            </div>
          </div>
        </article>
      <?php
      }
      ?>
    </div>
  </div>
</div>
<?php } ?>