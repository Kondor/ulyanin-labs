<?php
if (isset($_POST['do_post'])) {
    $path1 = $_FILES["fileArticle"]["name"];

    $file = $_FILES["fileArticle"];

    //$srcFileName = $file['name'];

    //var_dump($srcFileName);
    //print_r($path1);

    $path = "E:\\My projects(code)\\php\\myproject.loc\\www\\lab_3\\admin\\";

    //  путь удаления изображения из папки 
    //$newFilePath =  $path . 'static/' . 'images/' . $path1;
    $newFilePath = './static/images/' . $path1;

    //  путь загрузки файла в папку
    //$newFilePath = __DIR__ . '/static/' . '/images/' . $path1;

    //var_dump($newFilePath);

    // разрешенные расширения
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    // текущее расширение файла
    $extension = pathinfo($path1, PATHINFO_EXTENSION);

    if ($file['error'] !== UPLOAD_ERR_OK) {
        $error1 = 'Ошибка при загрузке файла.';

        header('Location: index.php');
        $error = 'Ошибка при загрузке файла.';
    } elseif (!in_array($extension, $allowedExtensions)) {
        $error = 'Загрузка файлов с таким расширением запрещена!';
        header('Location: index.php');
    } elseif (!move_uploaded_file($file['tmp_name'], $newFilePath)) {
        $error = 'Ошибка при загрузке файла';
    } else {
        // $result = 'http://myproject.loc/lab_2/uploads/' . $srcFileName;
    }

    //$nowDate = NOW();
    if (isset($_GET['id'])) {
        $mysql->query("UPDATE `articles` SET `title` = '{$_POST['titleArticle']}',`image` = '{$path1}',
                    `text` = '{$_POST['textArticle']}', `categorie_id` = '{$_POST['categorieArticle']}',
                    `pubdate` = NOW() WHERE `id`={$_GET['id']}");
    }
}

?>
<div id="article-edit-form" class="block">
<h3>Редактировать статью</h3>
<div class="block__content">
    <form class="form" method="POST" enctype="multipart/form-data">
        <div class="form__group">
            <div class="row">
                <div class="col-md-12">
                    <p><strong>Заголовок статьи</strong></p>
                    <input type="text" class="form__control" required="" name="titleArticle" placeholder="Заголовок статьи" value="<?php echo $art['title']; ?>">
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="row">
                <div class="col-md-12">
                    <p><strong>Выберите картинку для статьи</strong></p>
                    <?php
                    $imageFile = $mysql->query("SELECT `image` FROM `articles` WHERE `articles`.`id` = " . $art['id']);
                    $imageFileName = $imageFile->fetch_assoc()['image'];

                    $path = "E:\\My projects(code)\\php\\myproject.loc\\www\\lab_3\\admin\\";

                    //  путь удаления изображения из папки 
                    $newFilePath =  $path . 'static/' . 'images/' . $path1;
                    //  путь удаления изображения из папки 
                    // $newFilePath = __DIR__ . '/static/' . 'images/' . $imageFileName;
                    ?>
                    <input type="file" class="form__control" required="" name="fileArticle" value=" <?php echo $art['image']; ?> ">
                    <!-- value=" echo $art['image'];?>" -->
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="row">
                <div class="col-md-12">
                    <p><strong>Категория статьи</strong></p>
                    <input type="text" class="form__control" required="" name="categorieArticle" placeholder="Категория статьи" value="<?php echo $art['categorie_id']; ?>">
                </div>
            </div>
        </div>

        <div class="form__group">
            <p><strong>Текст статьи</strong></p>
            <input name="textArticle" required="" class="form__control" placeholder="Текст статьи ..." value="<?php echo $art['text']; ?>">
        </div>

        <div class="form__group">
            <input type="submit" class="form__control" name="do_post" value="Добавить">
        </div>
    </form>
</div>
</div>