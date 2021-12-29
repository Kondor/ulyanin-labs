<?php

function createFromJpg($srcWaterMark, $newFilePath)
{
    // Загрузка штампа и фото, для которого применяется водяной знак (называется штамп или печать)
    $stamp = imagecreatefrompng($srcWaterMark);
    $im = imagecreatefromjpeg($newFilePath);

    // Установка полей для штампа и получение высоты/ширины штампа
    $marge_right = 100;
    $marge_bottom = 30;
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);

    // Копирование изображения штампа на фотографию с помощью смещения края
    // и ширины фотографии для расчёта позиционирования штампа.
    imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

    // сохранение файла уже с водяным знаком 
    imagejpeg($im, $newFilePath);

    // $blackColor=ImageColorAllocate($im,0,0,0); //Создадим чёрный цвет в изображении
    $color=ImageColorAllocate($im,255,255,255);

    //укажем серверный заголовок, что выводимый скриптом контент является изображением
    Header('Content-type: image/jpeg');

    // представление текста на изображении
    ImageTTFtext($im,40,0,15,100,$color,__DIR__ . '/font/LeoHand.ttf',$_POST['usertext']);
    
    // сохраняем изображение уже с надписью
    imagejpeg($im, $newFilePath);

    $pdf=new Fpdf('L', 'mm', 'A4' );
    $pdf->AddPage();
    $pdf->Image($newFilePath,0,0,310,210); // 310,210
    $pdf->output('report.pdf', 'D' );

    ImageDestroy($im);//освобождаем память изображения в переменной
    imagejpeg($im);

    // удаляем изображеие
    unlink($newFilePath);
}

function createFromPng($srcWaterMark, $newFilePath)
{
        $stamp = imagecreatefrompng($srcWaterMark);
        $im = imagecreatefrompng($newFilePath);

        // Установка полей для штампа и получение высоты/ширины штампа
        $marge_right = 30;
        $marge_bottom = 30;
        $sx = imagesx($stamp);
        $sy = imagesy($stamp);

        // Копирование изображения штампа на фотографию с помощью смещения края
        // и ширины фотографии для расчёта позиционирования штампа.
        imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

        // сохранение файла уже с водяным знаком 
        imagepng($im, $newFilePath);

        $color=ImageColorAllocate($im,255,255,255);//Создадим чёрный цвет в изображении
        
        Header('Content-type: image/png');//укажем серверный заголовок, что выводимый скриптом контент является изображением

        // накладываем многострочный текст на изображение
        ImageTTFtext($im,40,0,15,100,$color,__DIR__ . '/font/LeoHand.ttf',$_POST['usertext']);
            
        imagepng($im, $newFilePath);

        $pdf=new Fpdf('L', 'mm', 'A4' );
        $pdf->AddPage();
        $pdf->Image($newFilePath,0,0,310,210); // 310,210
        $pdf->output('report.pdf', 'D' );

        ImageDestroy($im);//освобождаем память изображения в переменной
        imagepng($im);

        unlink($newFilePath);
}

function createFromGif($srcWaterMark, $newFilePath)
{
    $srcWaterMark = __DIR__ . '/uploads/' . 'watermark/water-sign-gif.png';

    $stamp = imagecreatefrompng($srcWaterMark);
    $im = imagecreatefromgif($newFilePath); 

    // Установка полей для штампа и получение высоты/ширины штампа
    $marge_right = 30;
    $marge_bottom = 30;
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);

    // Копирование изображения штампа на фотографию с помощью смещения края
    // и ширины фотографии для расчёта позиционирования штампа.
    imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

    // сохранение файла уже с водяным знаком 
    imagegif($im, $newFilePath);

    // $blackColor=ImageColorAllocate($im,0,0,0); //Создадим чёрный цвет в изображении
    $color=ImageColorAllocate($im,255,255,255);
    Header('Content-type: image/gif');//укажем серверный заголовок, что выводимый скриптом контент является изображением

    ImageTTFtext($im,16,0,15,100,$color,__DIR__ . '/font/LeoHand.ttf',$_POST['usertext']);
    
    imagegif($im, $newFilePath);

    $pdf=new Fpdf('L', 'mm', 'A4' );
    $pdf->AddPage();
    $pdf->Image($newFilePath,0,0,200,150); // 310,210
    $pdf->output('report.pdf', 'D' );

    ImageDestroy($im);//освобождаем память изображения в переменной
    imagegif($im);

    unlink($newFilePath);
}