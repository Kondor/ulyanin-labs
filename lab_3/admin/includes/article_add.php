    <h3>Добавить статью</h3>
    <div class="block__content">
        <form class="form" method="POST" action="index.php" enctype="multipart/form-data">
            <?php

            if (isset($_POST['do_post'])) 
            {
                $errors = array();

                if ($_POST['titleArticle'] == '') {
                    $errors[] = 'Введите заголовок';
                }



                if ($_POST['categorieArticle'] == '') {
                    $errors[] = 'Введите категорию';
                }

                if ($_POST['textArticle'] == '') {
                    $errors[] = 'Введите текст';
                }

                $path1 = $_FILES["fileArticle"]["name"];

                $file = $_FILES["fileArticle"];

                $path = "http://c917632p.beget.tech/lab_3/admin/";

                //  путь загрузки файла в папку
                //$newFilePath =  $path . 'static/' . 'images/' . $path1;
                $newFilePath = './static/images/' . $path1;

                //  путь загрузки файла в папку
                //$newFilePath = __DIR__ . '/static/' . '/images/' . $path1;


                // разрешенные расширения
                $allowedExtensions = ['jpg', 'png', 'gif'];

                // текущее расширение файла
                $extension = pathinfo($path1, PATHINFO_EXTENSION);

                /*if ($file['error'] !== UPLOAD_ERR_OK) {
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
                }*/
                move_uploaded_file($file['tmp_name'], $newFilePath);

                if (empty($errors)) {
                    $mysql->query("INSERT INTO `articles` (`title`, `image`, `text`, `categorie_id`,`pubdate`) VALUES
                      ('" . $_POST['titleArticle'] . "', '" . $path1 . "', '" . $_POST['textArticle'] . "', '" . $_POST['categorieArticle'] . "', NOW())");
                } else {
                    echo $errors['0'] . ' ошибка';
                }
            }
            ?>
            <div class="form__group">
                <div class="row">
                    <div class="col-md-12">
                        <p><strong>Заголовок статьи</strong></p>
                        <input type="text" class="form__control" required="" name="titleArticle" placeholder="Заголовок статьи">
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="row">
                    <div class="col-md-12">
                        <p><strong>Выберите картинку для статьи</strong></p>
                        <input type="file" class="form__control" required="" name="fileArticle">
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="row">
                    <div class="col-md-12">
                        <p><strong>Категория статьи</strong></p>
                        <input type="text" class="form__control" required="" name="categorieArticle" placeholder="Категория статьи">
                    </div>
                </div>
            </div>

            <div class="form__group">
                <p><strong>Текст статьи</strong></p>
                <textarea name="textArticle" required="" class="form__control" placeholder="Текст статьи ..."></textarea>
            </div>

            <div class="form__group">
                <input type="submit" class="form__control" name="do_post" value="Добавить">
            </div>
        </form>
    </div>