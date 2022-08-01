<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Страница <?=$page?></title>
</head>
<body>
<h1>Страница <?=$page?></h1>
<div>
    <?php
    echo $page_text;
    ?>
</div>
<div>
    <?php
    echo links ($page, $page_num, 'users.php', 'page');
    ?>
</div>
</body>
</html>
