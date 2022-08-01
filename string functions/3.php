<?php

// Найти самое длинное слово. Если таких несколько, вывести в браузер их все.

$text = 'What is Symfony. Symfony is a set of PHP Components, a Web Application framework, a Philosophy, and a Community - all working together in harmony.
Symfony Framework. The leading PHP framework to create websites and web applications. Built on top of the Symfony Components.
Symfony Components. A set of decoupled and reusable components on which the best PHP applications are built, such as Drupal, phpBB, and eZ Publish.
Symfony Community. A passionate group of over 600,000 developers from more than 120 countries, all committed to helping PHP surpass the impossible.
Symfony Philosophy. Embracing and promoting professionalism, best practices, standardization and interoperability of applications.';


$arr = str_word_count($text, 1); // $arr = explode(" ", $text); считает так же точки и игнорирует переносы

$max = $arr[0];
for ($i = 1; $i < count($arr); $i++) {
    if (strlen($arr[$i]) > strlen($max)) {
        $max = $arr[$i];
    }
}
for ($i = 1; $i < count($arr); $i++) {
    if (strlen($arr[$i]) == strlen($max)) {
        echo $arr[$i].' ';
    }
}