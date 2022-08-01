<html>
<head>
</head>
<body>
<h1>Четвертое задание</h1>
<pre>
    Известны длина и ширина сумки $a, $b, а также длина и ширина товара $c, $d.
    Напишите скрипт, определяющий, можно ли товар упаковать в сумку.
    Предусмотреть возможность ввода длины и ширины в произвольном порядке, например, 20, 30 или 30, 20.
    Усложнение задачи: добавьте еще высоту сумки и высоту товара. Учтите, что товар можно повернуть.
</pre>
<form action="" method="post">
    <p><b>Длина сумки:</b><br><input type="number" name="bag_l" /></p>
    <p><b>Ширина сумки:</b><br><input type="number" name="bag_w" /></p>
    <p><b>Высота сумки:</b><br><input type="number" name="bag_h" /></p>
    <hr>
    <p><b>Длина товара:</b><br><input type="number" name="item_l" /></p>
    <p><b>Ширина товара:</b><br><input type="number" name="item_w" /></p>
    <p><b>Высота товара:</b><br><input type="number" name="item_h" /></p>
    <input type="submit" name="submit" value="send" />
</form>
<?php
if (isset($_POST['bag_l']) && isset($_POST['bag_w']) && isset($_POST['bag_h']) &&
    isset($_POST['item_l']) && isset($_POST['item_w']) && isset($_POST['item_h'])) {
    $bag_l = $_POST['bag_l'];
    $bag_w = $_POST['bag_w'];
    $bag_h = $_POST['bag_h'];
    $item_l = $_POST['item_l'];
    $item_w = $_POST['item_w'];
    $item_h = $_POST['item_h'];

    if (($bag_l >= $item_l && $bag_w >= $item_w && $bag_h >= $item_h) || // 1
        ($bag_l >= $item_w && $bag_w >= $item_l && $bag_h >= $item_h) || // 2
        ($bag_l >= $item_w && $bag_w >= $item_h && $bag_h >= $item_l) || // 3
        ($bag_l >= $item_h && $bag_w >= $item_w && $bag_h >= $item_l) || // 4
        ($bag_l >= $item_h && $bag_w >= $item_l && $bag_h >= $item_w) || // 5
        ($bag_l >= $item_l && $bag_w >= $item_h && $bag_h >= $item_w)){ // 6
        echo "<br>Товар помещается в сумку";
    } else {
        echo "<br>Товар не помещается в сумку";
    }
}
?>
</body>
</html>