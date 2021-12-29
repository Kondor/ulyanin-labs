<?php
require 'config.php';
//адрес страницы
$address = null;

//количество рекурсивных переходов по страницам сайта
$allowable_count_recurs = 2;

//Время выполнения скрипта в секундах.
//Если это значение достигнуто, скрипт возвращает фатальную ошибку
$time_limit = 300;
set_time_limit($time_limit);

$all_link_internal = [];
$count_recurs = 0;
$count_iter = 1;

function getAllLink($address){
    global $all_link_internal , $allowable_count_recurs, $count_recurs;
    global $count_iter;

    // адрес
    $address = trim(trim(trim($address),'/'),'\\');
    
    // тип адреса php/html/htm
    $address_ext = pathinfo($address,PATHINFO_EXTENSION);

    // проверка на тип адреса
    if($address_ext == 'php' or $address_ext == 'html' or $address_ext == 'htm')
        $begin_addr = dirname($address); // убирает то, что после точки
    else $begin_addr = $address;

    // начало страницы
    $begin_addr = trim(trim($begin_addr,'/'),'\\');

    $page = @file_get_contents($address);
   
    // отбор ссылок
    preg_match_all('#<a.*?href=(["\'])([^"\']+?)\1.*?>#m',$page,$links);

    // все ссылки
    $links = $links[2];
    
    // перебираем ссылки
    foreach ($links as $link){
        $link = trim(trim(trim($link),'/'),'\\');
        
        if(strpos($link,'#') !== false){
            $link = str_replace('#'.parse_url($link, PHP_URL_FRAGMENT),'',$link);
        }

        if ($link and strpos($link,'javascript:') === false and strpos($link,'mailto:') === false){

            if(!in_array($link,$all_link_internal)){
                if(strpos($link,$address) !== false or (strpos($link,'https://') === false and strpos($link,'http://') === false)){
                    $linc_ext = pathinfo($link,PATHINFO_EXTENSION);
                    if(strpos($link,$address) !== false){
                        $all_link_internal[] = $link;
                    }else{
                        if($linc_ext == '' or $linc_ext == 'php' or $linc_ext == 'html' or $linc_ext == 'htm'){
                            $link = $begin_addr.'/'.$link;
                            if(!in_array($link,$all_link_internal)){
                                $all_link_internal[] = $link;
                            }
                        }
                    }
                }
            }
        }
    }

    if ($count_recurs === $allowable_count_recurs - 1)
    {
        foreach($all_link_internal as $link) {
            $dom = new DOMDocument('1.0');
                    if(@$dom->loadHTMLFile($link)) {
                        $allTitle = $dom->getElementsByTagName("title");
                        $CurrentTitle = $allTitle->length ? $allTitle->item(0)->nodeValue : '';
                    }
                    echo "<span style='color:#fff;font-size:14px; '>".
                    "[$count_iter]  <b>Ссылка:</b> <u>$link</u> | <b>Заголовок:</b> <u>$CurrentTitle</u></span><br/>";

            $count_iter = $count_iter + 1;
        }
    }

    $count_recurs++;

    foreach ($all_link_internal as $go){
            if($allowable_count_recurs > $count_recurs){
                    getAllLink($go);
                }
    }
}


//getAllLink($address);