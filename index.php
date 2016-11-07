<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Домашнее задание №2</title>
</head>
<body>
<h3>Задание 1 ============================================</h3>
<?php
function f1(array $str, $ret = false)
{
    if (!$ret) {
        foreach ($str as $val) {
            echo("<p>" . $val . "</p>");
        }
    }
    return implode(" ", $str);
}

echo f1(["Lorem ipsum", "consectetur elit", "cupiditate ea harum", "Atque eligendi"]);
echo f1(["Lorem ipsum", "consectetur elit", "cupiditate ea harum", "Atque eligendi"], true);
?>

<h3>Задание 2 ============================================</h3>
<?php
function f2(array $digit, $act)
{
    if (!empty($digit) && !empty($act)) { //проверяем обязательные параметры функции

        foreach ($digit as $key => $val) { // проверяем является ли массив списком со значениями - числами
            if (!is_numeric($key) || !is_numeric($val)) {
                return "Функция работает только с числами!";
            }
        }

// выбираем первый элемент массива, от которго будем производить вычисления и исключаем его из цикла перебора элементов
        $result = $digit[0];
//        $result = 0;
//        echo $result;
        echo $result . "<br>";

// выбираем операцию с числами
        switch ($act) {
            case "+":
//                echo "Результат сложения чисел:<br>";
                for ($i = 1; $i < count($digit); $i++) {
                    echo $digit[$i] . "<br>";
                    $result += $digit[$i];
                }
                break;

            case "-":
//                echo "Результат вычитания чисел:<br>";
                for ($i = 1; $i < count($digit); $i++) {
//                    echo "--" . $result . "(" . $i . ")<br>";
                    echo $digit[$i] . "<br>";
                    $result -= $digit[$i] . "<br>";
                }
                break;

            case "*":
//                echo "Результат умножения чисел:<br>";
                for ($i = 1; $i < count($digit); $i++) {
                    echo $digit[$i] . "<br>";
                    $result *= $digit[$i] . "<br>";
                }
                break;

            case "/":
//                echo "Результат деления чисел:<br>";
                if (in_array(0, $digit)) {
                    return "В массиве присутствует ноль. На ноль делить нельзя!";
                }
                for ($i = 1; $i < count($digit); $i++) {
                    echo $digit[$i] . "<br>";
                    $result /= $digit[$i] . "<br>";
                }
                break;

            default:
                return "Функция работает с простыми арифметическими операциями";
        }

        // результат
        echo("Результат ($act) чисел: " . $result . "<br>");
//        echo $result;
    } else {
        return "Оба параметра функции - обязательны!";

    }
}

echo f2([2, 4, 9], '/');
?>


<h3>Задание 4 ============================================</h3>
<?php
function tableNumber($x, $y)
{
    if (func_num_args() == 2) {
        if (is_int($x) && is_int($y)) {
//            echo "выполнено условие";

            echo "<table border='1' cellpadding='10px'><tr><td></td>";
            for ($i = 1; $i <= $y; $i++) {
                echo "<td>$i</td>";
            }
            echo "</tr>";
            for ($i = 1; $i <= $x; $i++) {
                echo "<tr><td>$i</td>";
                for ($j = 1; $j <= $y; $j++) {
                    echo "<td>" . $i * $j . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";


        } else {
            return "Числа должны быть целыми";
        }

    } else {
        return "Функция должна принимать два параметра";
    }

}

echo tableNumber(2, 5);
?>

<h3>Задание 6 ============================================</h3>
<?php
echo "Текущая дата " . date("d.m.Y H:i") . "<br>";
echo strtotime("24 February 2016 00:00:00") . "<br>";

?>

<h3>Задание 7 ============================================</h3>
<?php
$s1 = "Карл у Клары украл Кораллы";
$s2 = str_replace("К", "", $s1);
echo $s2 . "<br>";

$s3 = "Две бутылки лимонада";
$s4 = str_replace("Две", "Три", $s3);
echo $s4;

?>


<h3>Задание 9 ============================================</h3>
<?php

function f9($file)
{
    if (file_exists($file)) {
//        echo "файл существует";
        $content = file_get_contents($file);
        return $content;
    } else {
        return "файл не существует";
    }
}

echo f9("text.txt");

?>

<h3>Задание 10 ============================================</h3>
<?php
$file = 'anothertest.txt';
$text = 'Hello again!';
file_put_contents($file, $text);

?>

</body>
</html>
