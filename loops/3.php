<html>
<!--
Обеспечьте плавное изменение цвета шрифта k строк от черного к белому
(первая строка – черный цвет, последняя строка – белый, промежуточные – градации серого).
Можно просто добавить к коду первого задания.
-->
<table border="1">
    <tr>
        <td>Номер</td>
        <td colspan="100"">Число</td>
    </tr>
    <?php
    $k = 10;
    $n = 6;
    $color = null;
    $color1 = 'green';
    $color2 = 'orange';
    $color3 = 'red';
    for ($i = 1; $i <= $k; $i++) {
            $x = (int)(255 / ($k - 1) * $i);
            $fontcolor = "rgb($x, $x, $x)";
        if ($color == $color1) {
            $color = $color2;
        } elseif ($color == $color2) {
            $color = $color3;
        } else {
            $color = $color1;
        }
        echo "<tr style='background-color:".$color.";color: ".$fontcolor."'><td>$i</td>";
        for ($j = 0; $j <= $n; $j++) {
            echo "<td>" . rand(1,99) . "</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
</html>