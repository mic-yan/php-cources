<html>
<head>
</head>
<body>
<h1>Второе задание</h1>
<pre>
    Напишите скрипт, определяющий сумму максимального и минимального из трех чисел $a, $b, $c.
</pre>
<form action="" method="post">
<p><b>Number A:</b><br><input type="number" name="num_a" /></p>
<p><b>Number B:</b><br><input type="number" name="num_b" /></p>
<p><b>Number C:</b><br><input type="number" name="num_c" /></p>
<p><input type="submit" name="submit" value="send" /></p>
</form>
<?php
    if (isset($_POST['num_a']) && isset($_POST['num_b']) && isset($_POST['num_c'])) {
        $a = $_POST['num_a'];
        $b = $_POST['num_b'];
        $c = $_POST['num_c'];
        $min = $a;
        if ($b < $min) {
            $min = $b;
        }
        if ($c < $min) {
            $min = $c;
        }
        $max = $a;
        if ($b > $max) {
            $max = $b;
        }
        if ($c > $max) {
            $max = $c;
        }
        echo $summ = $min + $max;
    }
?>
</body>
</html>
