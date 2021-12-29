<?php
    $per_page = 4; // количество записей на 1 страницу
    $page = 1;

    if (isset($_GET['page'])) 
    {
        $page = (int) $_GET['page'];
    }

    $total_count_q = $mysql->query("SELECT COUNT(id) AS `total_count` FROM `articles`");
    $total_count = $total_count_q->fetch_assoc();
    $total_count = $total_count['total_count'];

    $total_pages = ceil($total_count / $per_page); // макс страниц
    if ($page <= 1 || $page > $total_pages) 
    {
        $page = 1;
    }

    $offset = 0;
    $offset = ($per_page * $page) - $per_page;
    // 1 | (4*1) - 4      -     0, 4
    // 2 | (4*2) - 4      -     4, 4
    // 3 | (4*3) - 4      -     8, 4
?>