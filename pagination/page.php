<html>
<head>
    <meta charset="UTF-8">
    <title>Страница <?=$page?></title>
</head>
<body>
<h1>Страница <?=$page?></h1>
<div>
    <?php
    $a = output_text ($page_text);
    $a = one_word ('что', $a);
    echo $a;
    ?>
</div>
<div>
    <?php
    echo '<p>Кол-во предложений: '.text_sentences($page_text).'</p>
          <p>Кол-во слов: '.text_words($page_text).'</p>
          <p>Кол-во символов: '.text_symbols($page_text).'</p>';
    ?>
</div>
<div>
    <?php
    echo links ($page, $pages_count, 'users.php', 'page');
    ?>
</div>
</body>
</html>