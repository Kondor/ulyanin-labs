<section class="main__form">
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
</section>