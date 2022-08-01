<?php

// проверка на номер страницы
function page_validation($total_num): int
{
    $page = intval($_GET['page'] ?? 1 );
    if ($page < 1 || $page > $total_num) {
        echo 'Запрошенная страница не существует';
    }
    return $page;
}

//получение общего кол-ва месседжей в бд
function number_of_messages($data): int
{
    return count($data);
}

// получение кол-ва страниц
function number_of_pages ($number_of_messages, $n): float|int
{
    $pages_count = ceil($number_of_messages/$n);
    if ($pages_count == 0) {
        $pages_count = 1;
    }
    return $pages_count;
}

// получение первого месседжа
function get_first_message ($page, $n): float|int
{
    return ($page - 1) * $n;
}

// получение текста месседжей для определенной страницы
function get_page_content ($text_array, $first_page, $n): array
{
    return array_slice($text_array, $first_page, $n);
}

// вывод месседжей на страницу
function output_content ($data,$page): string
{
    $html = '';
    foreach ($data as $row) {
        $result = $row['id'] . '. ' . $row['user'] . ' - ' . $row['message_text'] . ' (' .
            $row['message_time'] . ')' . " <a href="."/img/". $row['image'] .">image</a>" . " | " . '<a href="edit.php?id=' . $row['id'] . '&page=' . $page . '">Edit</a>' . '/<a href="delete.php?page=' . $page . '&id=' . $row['id'] . '">Delete</a>' . "<br>";
    $html .= "<div>$result<hr></div>";
}
    return $html;
}

// ссылки на другие страницы
function links ($page, $pages_count, $url, $parameter): string
{
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

// кодирование имени файла
function filename_encoding($file): string
{
    $file_code = md5($file);
    $file_ext = pathinfo($file, PATHINFO_EXTENSION);
    return $file_code.".".$file_ext;
}