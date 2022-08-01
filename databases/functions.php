<?php

// проверка на номер страницы
function page_validation() {
    $page = intval($_GET['page'] ?? 1 );
    if ($page < 1) {
        throw new Exception('Запрошенная страница не существует');
    }
    return $page;
}

//получение общего кол-ва месседжей в бд
function number_of_messages($data)
{
    return count($data);
}

// получение кол-ва страниц
function number_of_pages ($number_of_messages, $n)
{
    $pages_count = ceil($number_of_messages/$n);
    if ($pages_count == 0) { // если данных нет
        $pages_count = 1; //то одна страница, хоть и пустая, все равно должна быть
    }
    return $pages_count;
}

// получение первого месседжа
function get_first_message ($page, $n)
{
    return ($page - 1) * $n;
}

// получение текста месседжей для определенной страницы
function get_page_content ($text_array, $first_page, $n)
{
    return array_slice($text_array, $first_page, $n);
}

// вывод месседжей на страницу
function output_content ($data)
{
    $html = '';
    foreach ($data as $row) {
        $result = $row['id'] . '. ' . $row['user'] . ' - ' . $row['message_text'] . ' (' .
            $row['message_time'] . ')' . " <a href="."/img/". $row['image'] .">image</a> <br/>"; // upd: добавил ссылку на картинку из скрипта в forms
    $html .= "<div>$result<hr></div>";
}
    return $html;
}

// ссылки на другие страницы
function links ($page, $pages_count, $url, $parameter){
    $html = '';
    for ($i = 1; $i <= $pages_count; $i++) {
        if ($i == $page) {
            $html .= "$i ";
        } else {
            $html .= "<a href=\"$url?$parameter=$i\">$i</a> ";
        }
    }
    return $html;
}


// ссылки на другие страницы 2
// function links2($mess_num, $n, )