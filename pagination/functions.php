<?php

// вывод кол-ва предложений
function text_sentences ($page_text)
{
    $a = implode(" ", $page_text);
    return mb_substr_count($a, '.');
}

// вывод кол-ва слов
function text_words ($page_text) {
    $a = implode(" ", $page_text);
    return str_word_count($a, 0, 'АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя');
}

// вовод общего кол-ва символов
function text_symbols ($page_text) {
    $a = implode(" ", $page_text);
    return mb_strlen($a);
}

// перекрашивание одного слова в тексте
function one_word ($word, $page_text){
    $count = mb_substr_count($page_text, $word);
    echo str_replace($word, '<span style="color:red;">'.$word.'</span>', $page_text);
}

// обрамление первой буквы предложения жирным шрифтом
function bold_first_letter ($page_text) {
    $result = preg_replace_callback('/(^|[.]\s*)([А-Я])/u', function($matches){
        return $matches[1]."<span style='font-weight: bold'>".$matches[2]."</span>";
    }, $page_text);
    return $result;
}



// проверка на номер страницы
function page_validation() {
    $page = intval($_GET['page'] ?? 1 );
    if ($page < 1) {
        throw new Exception('Запрошенная страница не существует');
    }
    return $page;
}

// преобразование текста в массив по абзацам
function text_to_array ($text)
{
    $text_array = explode(PHP_EOL, $text);
    return $text_array;
}

//получение общего кол-ва абзацев в тексте
function number_of_articles ($text_array)
{
    return count($text_array);
}

// получение кол-ва страниц
function number_of_pages ($article_count, $k)
{
    $pages_count = ceil($article_count/$k);
    if ($pages_count == 0) { // если данных нет
        $pages_count = 1; //то одна страница, хоть и пустая, все равно должна быть
    }
    return $pages_count;
}

// получение первого абзаца
function get_first_article ($page, $k)
{
    return ($page - 1) * $k;
}

// получение текста для определенной страницы
function get_page_text ($text_array, $first_page, $k)
{
    return array_slice($text_array, $first_page, $k);
}

// вывод текста на страницу
function output_text ($page_text)
{
    $html = '';
    foreach ($page_text as $key => $item) {
        $result = preg_replace_callback('/(^|[.]\s*)([А-Я])/u', function($matches){
            return $matches[1]."<span style='font-weight: bold'>".$matches[2]."</span>";
        }, $item);
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