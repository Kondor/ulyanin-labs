<h3>Добавить комментарии</h3>
<div class="block__content">
    <form class="form" method="POST" action="article.php?id=<?php echo $art['id']; ?>#comment-add-form">
        <?php
        if (isset($_POST['do_post'])) {
            $errors = array(); // ошибки

            if ($_POST['nickname'] == '') {
                $errors[] = 'Введите никнейм';
            }

            if ($_POST['email'] == '') {
                $errors[] = 'Введите email';
            }

            if ($_POST['text'] == '') {
                $errors[] = 'Введите комментарий';
            }

            // вставка комментария
            if (empty($errors)) {
                $mysql->query("INSERT INTO `comments` (`nickname`, `email`, `text`, `pubdate`,`articles_id`) VALUES
                                                    ('" . $_POST['nickname'] . "', '" . $_POST['email'] . "', '" . $_POST['text'] . "', NOW(), '" . $art['id'] . "')");
            } else {
                echo $errors['0'] . ' ошибка';
            }
        }
        ?>
        <div class="form__group">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form__control" required="" name="nickname" placeholder="Никнейм">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form__control" required="" name="email" placeholder="Email (не будет показан)">
                </div>
            </div>
        </div>
        <div class="form__group">
            <textarea name="text" required="" class="form__control" placeholder="Текст комментария ..."></textarea>
        </div>
        <div class="form__group">
            <input type="submit" class="form__control" name="do_post" value="Добавить комментарий">
        </div>
    </form>
</div>
