<?php

	/* Задаём общие настройки выполнения серверных скриптов */

	# Режим работы
	set_time_limit (10);
	error_reporting (E_ALL);
	ignore_user_abort (false);

    # Название сайта
    $siteName = 'Форма отправки файла';

	# Пути
	$dir = '.'; 
	#$www = 'http://localhost/lab_2/';

	# SMARTY
	require_once 'smarty/libs/Smarty.class.php';

    # создали новый объект класса Smarty
	$smarty = new Smarty();

	$smarty -> setTemplateDir($dir . '/smarty/templates');
	$smarty -> setConfigDir($dir . '/smarty/configs');
	$smarty -> setCompileDir($dir . '/smarty/compile');
	$smarty -> setCacheDir($dir . '/smarty/cache');