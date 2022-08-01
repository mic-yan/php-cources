<?php

$text = file_get_contents("text.txt"); // получаем содержимоей файла (текст)

$sentences = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $text); // разделяем текст на предложения через массив

print_r($sentences);

$keynum = count($sentences); // подсчитываем кол-во ключей

$array = array(); // объявляем массив для предложений после выборки

for ($i = 0; $i  < $keynum; $i++) { // выборка предложений по условию нескольких слов
    if ((stripos($sentences[$i], "ipsum") && stripos($sentences[$i], "sit") && stripos($sentences[$i], "amet")) !== false) {
        $array[] = $sentences[$i];
    }
}

print_r($array); // смотрим результаты

$backtotext = implode("\n", $array); // трансформируем массив обратно в текст

$newfile = fopen('new_text.txt', 'w'); // создаем новый файд
fwrite($newfile, $backtotext); // записываем в него текст