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
    echo links ($page, $page_num, 'index.php', 'page');
    ?>
</div>
<br>
<div>
    <?php
    if (isset($_GET['page'])) {
        echo "<a href ='add.php?page=" . $_GET['page'] . "'>Добавить Сообщение</a >";
    } else {
        echo "<a href='add.php?page=1'>Добавить Сообщение</a>";
    }
    ?>
</div>
</body>
</html>
