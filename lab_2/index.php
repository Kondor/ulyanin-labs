<?php
    require './config.php';
    // include_once 'smarty/libs/Smarty.class.php';

    # создали новый объект класса Smarty
    // $smarty = new Smarty();
    
    $smarty->assign('siteName', $siteName);

    # fetch() - сохраняет всю отработку в отдельную переменную
    $smarty -> assign('HEAD', $smarty -> fetch('head.tpl'));
    $smarty -> assign('HEADER', $smarty -> fetch('header.tpl'));
    $smarty -> assign('FOOTER', $smarty -> fetch('footer.tpl'));
    $smarty -> assign('MAIN', $smarty -> fetch('main.tpl'));

    // $smarty -> compile_check = FALSE; // когда закончу работать с сайтом

    # display() — отображает шаблон
    $smarty -> display('load.tpl');
    
    
?>
