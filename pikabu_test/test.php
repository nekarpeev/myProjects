
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
    // 	calc(2);
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