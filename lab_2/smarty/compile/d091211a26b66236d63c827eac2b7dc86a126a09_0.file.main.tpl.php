<?php
/* Smarty version 3.1.39, created on 2021-10-01 14:46:26
  from '/home/c/c917632p/c917632p.beget.tech/public_html/myproject.loc/lab_2/smarty/templates/main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6156f5122538a2_51082469',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd091211a26b66236d63c827eac2b7dc86a126a09' => 
    array (
      0 => '/home/c/c917632p/c917632p.beget.tech/public_html/myproject.loc/lab_2/smarty/templates/main.tpl',
      1 => 1633088765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6156f5122538a2_51082469 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="main__form">
    <form action="form.php" method="post" enctype="multipart/form-data">
    <h1>Форма отправки файла</h1>
    <div class="input-form">
        <input type="file" name="userfile" class="userfile">
    </div>

    <div class="input-form">
        <textarea placeholder="Введите текст" name="usertext" class="usertext" cols="30" rows="10" >
        </textarea>
    </div>

    <div class="input-form">
        <ul class="description">
            <li><h3>Описание пользования:</h3></li>
            <li>Следует выбрать изображение формата (.gif, .jpg, .png) для загрузки.</li>
            <li>Описать то, что вы хотите нанести на холст.</li>
            <li>Получить файл в формате .pdf</li>
        </ul>
    </div>

    <div class="input-form">
        <input type="submit" value="Отправить файл" class="">
    </div>
    </form>
</section><?php }
}
