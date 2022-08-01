<?php

// Вывести в браузер статистику файла – количество абзацев,
// предложений, слов, символов.

$text = 'What is Symfony. Symfony is a set of PHP Components, a Web Application framework, a Philosophy, and a Community - all working together in harmony.
Symfony Framework. The leading PHP framework to create websites and web applications. Built on top of the Symfony Components.
Symfony Components. A set of decoupled and reusable components on which the best PHP applications are built, such as Drupal, phpBB, and eZ Publish.
Symfony Community. A passionate group of over 600,000 developers from more than 120 countries, all committed to helping PHP surpass the impossible.
Symfony Philosophy. Embracing and promoting professionalism, best practices, standardization and interoperability of applications.';

echo $text;

$article = count(explode(PHP_EOL, $text));
// $article = count(preg_split("/\r\n|\n|\r/", $text));

$sentence = substr_count($text, '. ');

$words = count(explode(' ', $text)); // а можно так: $words = str_word_count($text); ?

$symbols = strlen($text);

echo '<p>Кол-во абзацев: '.$article.'</p>
      <p>Кол-во предложений: '.$sentence.'</p>
      <p>Кол-во слов: '.$words.'</p>
      <p>Кол-во символов: '.$symbols.'</p>';