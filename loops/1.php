<html>
<!-- Напишите скрипт, выводящий таблицу из k случайных чисел с чередованием фона строк
из 3 цветов – цвет1, цвет2, цвет3, цвет1, цвет2, цвет3 и т.д. --!>
<table border="1">
    <tr>
        <td>Номер</td>
        <td>Число</td>
    </tr>
    <?php
    $k = 20;
    $color = null;
    $color1 = 'green';
    $color2 = 'yellow';
    $color3 = 'red';
    for ($i = 1; $i <= $k; $i++) {
        if ($color == $color1) {
            $color = $color2;
        } elseif ($color == $color2) {
            $color = $color3;
        } else {
            $color = $color1;
        }
        echo "<tr style='background-color:".$color."'><td>$i</td><td>" . rand(1, 99) . "</td></tr>";
    }
    ?>
</table>
</html>