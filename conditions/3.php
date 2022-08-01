<html>
<head>
</head>
<body>
<h1>Третье задание</h1>
<pre>
    Напишите скрипт, определяющий максимальное из четырех чисел $a, $b, $c, $d.
</pre>
<form action="" method="post">
<p><b>Number A:</b><br><input type="number" name="num_a" /></p>
<p><b>Number B:</b><br><input type="number" name="num_b" /></p>
<p><b>Number C:</b><br><input type="number" name="num_c" /></p>
<p><b>Number D:</b><br><input type="number" name="num_d" /></p>
<p><input type="submit" name="submit" value="send" /></p>
</form>
<?php
if (isset($_POST['num_a']) && isset($_POST['num_b']) && isset($_POST['num_c']) && isset($_POST['num_d'])) {
    $a = $_POST['num_a'];
    $b = $_POST['num_b'];
    $c = $_POST['num_c'];
    $d = $_POST['num_d'];
    $max = $a;
    if ($b > $max) {
        $max = $b;
    }
    if ($c > $max) {
        $max = $c;
    }
    if ($d > $max) {
        $max = $d;
    } echo "Максимальное число - $max";
}
?>
</body>
</html>
