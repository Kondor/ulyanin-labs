<?php
/* Smarty version 3.1.39, created on 2021-11-20 22:19:16
  from '/home/c/c917632p/c917632p.beget.tech/public_html/wp-content/lab_2/smarty/templates/main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61994a344d47a5_56333808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50d281423207f5bf93d501726c56f9358e30e4ff' => 
    array (
      0 => '/home/c/c917632p/c917632p.beget.tech/public_html/wp-content/lab_2/smarty/templates/main.tpl',
      1 => 1637435843,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61994a344d47a5_56333808 (Smarty_Internal_Template $_smarty_tpl) {
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
