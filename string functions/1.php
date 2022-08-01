<?php

// Определить, сколько раз встречается в тексте слово Symfony и вывести текст,
// выделив его в тексте цветом.

$text = 'What is Symfony. Symfony is a set of PHP Components, a Web Application framework, a Philosophy, and a Community - all working together in harmony.
Symfony Framework. The leading PHP framework to create websites and web applications. Built on top of the Symfony Components.
Symfony Components. A set of decoupled and reusable components on which the best PHP applications are built, such as Drupal, phpBB, and eZ Publish.
Symfony Community. A passionate group of over 600,000 developers from more than 120 countries, all committed to helping PHP surpass the impossible.
Symfony Philosophy. Embracing and promoting professionalism, best practices, standardization and interoperability of applications.';

$word = 'Symfony';
$count = mb_substr_count($text, $word);
echo $count.'<br>';
echo $result = str_replace($word, '<span style="color:red;">'.$word.'</span>', $text);