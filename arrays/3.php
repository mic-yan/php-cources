<?php
// В двумерном массиве определить номера столбцов, не содержащих ни одного нулевого элемента, (1,3,4)
// и вычислить произведения элементов каждого из этих столбцов.

/*

[1, 2, 3]
[,5 ,8, 15]
[3, 5, 7]
[
    [9, 2, 4],
    [5 ,0, 15],
    [3, 5, 7]
]

 */

$arr = [
    [1, 5, 3, 7],
    [6 ,0, 15, 2],
    [4, 5, 7, 4]
];
$count_internal_arr = count($arr[0]); // 4
$count_external_arr = count($arr); // 3
$num_col_arr = [];
$mul_col_arr = [];
for ($i = 0; $i < $count_internal_arr; $i++) {
    $sub_arr = $arr[$i];
    $num_col_arr[$i] = true;
    $mul_col_arr[$i] = 1;
    for ($j = 0; $j < $count_external_arr; $j++) {
        if ($arr[$j][$i] == 0) {
            unset($num_col_arr[$i]);
        }

        $mul_col_arr[$i] *= $arr[$j][$i];
    }
    if ($mul_col_arr[$i] == 0) {
        unset($mul_col_arr[$i]);
    }
}
print_r($num_col_arr);
echo "<hr>";
print_r($mul_col_arr);