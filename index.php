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

<h3>Задание 3 ============================================</h3>
<?php
function f3_calc()
{
    if (func_num_args() > 2) {
//        echo "Условие выполнено!";
        $act = func_get_arg(0); // первый аргумент - строка
//        var_dump($act);
        if (is_string($act)) {
            $mas_arg = func_get_args(); // получаем массив аргументов
//            var_dump($mas_arg);

            $args_func = [];

//          проверяем числовые аргументы в цикле и сохраняем числа в массив, не учитываем первый аргумент строку
            for ($i = 1; $i < count($mas_arg); $i++) {
                if (is_numeric($mas_arg[$i])) {
                    // записываем аргументы в массив
                    $args_func[] = $mas_arg[$i];
//                    var_dump($args_func);
                } else {
                    return "Аргументы должны быть числами";
                }
            }

// выбираем первый элемент массива, от которго будем производить вычисления и исключаем его из цикла перебора элементов
            $result = $args_func[0]; // начинаем операции с первого аргумента
//            var_dump($result);
// выбираем операцию с числами
            switch ($act) {
                case "+":
//                echo "Результат сложения чисел:<br>";
                    for ($i = 1; $i < count($args_func); $i++) {
//                        echo $args_func[$i] . "<br>";
                        $result += $args_func[$i];
                    }
                    break;

                case "-":
//                echo "Результат вычитания чисел:<br>";
                    for ($i = 1; $i < count($args_func); $i++) {
//                        echo $args_func[$i] . "<br>";
                        $result -= $args_func[$i];
                    }
                    break;

                case "*":
//                echo "Результат умножения чисел:<br>";
                    for ($i = 1; $i < count($args_func); $i++) {
//                        echo $args_func[$i] . "<br>";
                        $result *= $args_func[$i] . "<br>";
                    }
                    break;

                case "/":
//                echo "Результат деления чисел:<br>";
                    if (in_array(0, $args_func)) {
                        return "В массиве присутствует ноль. На ноль делить нельзя!";
                    }
                    for ($i = 1; $i < count($args_func); $i++) {
//                        echo $args_func[$i] . "<br>";
                        $result /= $args_func[$i] . "<br>";
                    }
                    break;

                default:
                    return "Функция работает с простыми арифметическими операциями";
            }

            // результат
            echo("Результат ($act) чисел: " . $result . "<br>");


        } else {
            return "Первый аргумент должен быть строкой";
        }

    } else {
        return "Параметров должно быть не меньше 3";
    }

}

echo f3_calc("/", 10, 5, 1);
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

<h3>Задание 5 ============================================</h3>
<?php
function palindrom($st)
{
    if (is_string($st)) {

        $st = str_replace(" ", "", strtolower($st));
        $strrev = strrev($st);
        if ($st === $strrev) {
            return true;
        } else {
            return false;
        }

    } else {
        return false;
    }
}

function res_palindrom($st)
{
    if (palindrom($st)) {
        return "Палиндром";
    } else {
        return "Не Палиндром";
    }
}

echo res_palindrom("abj Jba");
echo "<br>";

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

<h3>Задание 8 ============================================</h3>
<?php
function smile()
{
    return chr(58) . chr(41);
}

function rx_packet($rx_str)
{
    echo $rx_str . "<br>";
    if (is_string($rx_str)) {
        if (strpos($rx_str, ":)") !== false) {
            return smile();
        }

        preg_match("/(packets):([0-9]*)/", $rx_str, $matches);

        if ($matches[2] > 1000) {
//            print_r($matches);
            echo "Сеть естьь<br>";
        } else {
            echo "Сети нет";
        }

    } else {
        return "Введите аргумент строку";
    }

}

//$rx_str = "RX packets:950 errors:0 dropped:0 overruns:0 frame:0.";
$rx_str = "RX packets:950381 errors:0 dropped:0 overruns:0 frame:0.";
//$rx_str = "kldfjgbl adlfkjlsj";

echo rx_packet($rx_str);
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
