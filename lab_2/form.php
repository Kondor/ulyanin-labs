<?php
    require './config.php';
    require (__DIR__ . '/fpdf/fpdf.php');
    require './create-from.php';

    if (!empty($_FILES['userfile'])) {

        $file = $_FILES['userfile'];

        $srcFileName = $file['name'];

        //  путь загрузки файла в папку
        $newFilePath = __DIR__ . '/uploads/' . $srcFileName;

        // разрешенные расширения
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        // текущее расширение файла
        $extension = pathinfo($srcFileName, PATHINFO_EXTENSION);

        if ($file['error'] !== UPLOAD_ERR_OK) {
            $error1 = 'Ошибка при загрузке файла.';
            
            header('Location: index.php');
            $error = 'Ошибка при загрузке файла.';
            
        }elseif (!in_array($extension, $allowedExtensions)) {
            $error = 'Загрузка файлов с таким расширением запрещена!';
            header('Location: index.php');
    
        } elseif (file_exists($newFilePath)) {
            $error = 'Файл с таким именем уже существует';
            header('Location: index.php');
        } elseif (!move_uploaded_file($file['tmp_name'], $newFilePath)) {
            $error = 'Ошибка при загрузке файла';
        } else {
            // $result = 'http://myproject.loc/lab_2/uploads/' . $srcFileName;
        }

        //  путь нахождения водяного знака
        $srcWaterMark = __DIR__ . '/uploads/' . 'watermark/water-sign.png';

        if($extension === 'jpg' or $extension === 'jpeg') {
            createFromJpg($srcWaterMark, $newFilePath);
        } elseif($extension === 'png') {
            createFromPng($srcWaterMark, $newFilePath);
        } elseif($extension === 'gif') {
            createFromGif($srcWaterMark, $newFilePath);
        }
        

    }

?>