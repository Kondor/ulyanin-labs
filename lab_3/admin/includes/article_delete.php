<?php
if (isset($_POST['delete_post'])) {
    $imageFile = $mysql->query("SELECT `image` FROM `articles` WHERE `articles`.`id` = " . $art['id']);
    $imageFileName = $imageFile->fetch_assoc()['image'];

    print_r($imageFileName);

    $path = "E:\\My projects(code)\\php\\myproject.loc\\www\\lab_3\\admin\\";

    //  путь удаления изображения из папки 
    //$newFilePath =  $path . 'static/' . 'images/' . $imageFileName;
    $newFilePath = './static/images/' . $imageFileName;
    //  путь удаления изображения из папки 
    //$newFilePath = __DIR__ . '/static/' . 'images/' . $imageFileName;

    // удаляем изображеие
    unlink($newFilePath);

    // удаление
    $mysql->query("DELETE FROM `articles` WHERE `articles`.`id` = " . $art['id']);
    Header("Location: index.php");
}

?>