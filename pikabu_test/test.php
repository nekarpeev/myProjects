
<?php 
//14. Перепишите функцию calc с использованием рекурсии:

function calc($x) {
    echo $x . '<br>';
    $out = 1;
    while ($x > 1) {
        $out *= $x--;
    }
    echo $x . '<br>';
    return $out;

    // if($x > 0) {
    //  calc(2);
    // }
    
}

//echo calc(4) . '<br>';
    
function myCalc($x) {
    static $out = 1;
    if($x > 0) {
        $out *= $x--;
        myCalc($x);
    }
    return $out;

    
    
}

//echo myCalc(3) . '<br>';

//22. Максимально сократите код следующей функции так, чтобы скорость её выполнения на большом числе запусков осталась неизменной или стала выше:

/*
function calcDelta(array $oldTags, array $newTags) {
    $addedTags = array();
    $removedTags = array();
    foreach ($oldTags as $tag) {
        if (!in_array($tag, $newTags)) {
            $removedTags[] = mb_strtolower($tag);
        }
    }
    foreach ($newTags as $tag) {
        if (!in_array($tag, $oldTags)) {
            $addedTags[] = mb_strtolower($tag);
        }
    }
    return array($addedTags, $removedTags);
}

$oldTags = ['NIK', 'VLAD'];
$newTags = ['GUZ', 'MAKS'];


print_r(calcDelta($oldTags, $newTags));
*/


function calcDelta(array $oldTags, array $newTags) {
    $addedTags = array();
    $removedTags = array();

    foreach ($oldTags as $tag) {
        if (!in_array($tag, $newTags)) {
            $removedTags[] = mb_strtolower($tag);
        }
    }
    foreach ($newTags as $tag) {
        if (!in_array($tag, $oldTags)) {
            $addedTags[] = mb_strtolower($tag);
        }
    }

    return array($addedTags, $removedTags);
}

$oldTags = ['NIK', 'VLAD', 'kik'];
$newTags = ['GUZ', 'MAKS', 'kik'];


?> <pre> <?php //print_r(calcDelta($oldTags, $newTags)); ?> </pre> <?php




//18. Есть массив: название сервера - вероятностный "вес" его выбора
// $list = array(
//     "server1" => 100,
//     "server2" => 100,
//     "server3" => 60,
// );


//Напишите функцию, которая будет делать выбор случайного сервера (ключ массива), учитывая "веса" каждого сервера (значение массива).

function changeServer($list, $min) {

    $result = array_search($min, $list);
    return $result;
}

$list = array(
    "server1" => 100,
    "server2" => 100,
    "server3" => 60,
);

$min = min($list);
//print_r( changeServer($list, $min) );



/*
15. Напишите функцию, которая, используя регулярное выражение, будет искать в заданном тексте количество комментариев и соответствующее время их написания:

1 комментарий был оставлен 5 минут назад, а затем 3 комментария оставили 1 минуту назад. 10 комментариев было оставлено 15 часов назад. Ещё 327 комментариев оставили 7 дней назад
Функция должна вернуть массив вида:
*/

 $text = 'комментарий был оставлен 5 минут назад, а затем 3 комментария оставили 1 минуту назад. 10 комментариев было оставлено 15 часов назад. Ещё 327 комментариев оставили 7 дней назад';


array(
    array(1, 5),
    array(3, 1),
    array(10, 900),  // 900 = 60 минут * 15 часов
    array(327, 10080)  // 10080 = 60 минут * 7 дней
);

$regexp = '/\d\sкоммент/ui';

$result = [];

preg_match_all($regexp, $text, $result, PREG_OFFSET_CAPTURE);
    
?> <pre> <?php print_r($result[0]); ?> </pre> <?php

