<html>
<head>
</head>
<body>
<h1>Первое задание</h1>
<pre>
Напишите скрипт, которой для числа $x выводит его значение разным цветом
зеленым – если $x положительно
желтым – если $x равно 0
красным – если $x отрицательно
</pre>
<br>
<form action="" method="post">
        Number:  <input type="number" name="xnum" />
        <input type="submit" name="submit" value="send" />
</form>

<?php
if (isset($_POST['xnum'])) {
    $x=$_POST['xnum'];
    if ($x>0) {
        echo "<p style='color:green'>$x</p>";
    } elseif ($x<0) {
        echo "<p style='color:red'>$x</p>";
    } else {
        echo "<p style='color:yellow'>$x</p>";
    }
}
?>
</body>
</html>
