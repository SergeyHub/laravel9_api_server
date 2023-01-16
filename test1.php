<?php

$array = array(
    array('name' => 'ванов','specialty' => 'хирург'),
    array('name' => 'Ивgанов','specialty' => 'хирург'),
    array('name' => 'Иванов','specialty' => 'хирург'),
    array('name' => 'Иванов','specialty' => 'хирург'),
    array('name' => 'Иdванов','specialty' => 'хирург'),
    array('name' => 'Иванов','specialty' => 'хирург'),
    array('name' => 'Иvванов','specialty' => 'хирург'),
    array('name' => 'Петров','specialty' => 'кардиолог'),
);

echo '<p>Исходный массив</p><pre>'.print_r($array, true).'</pre>';

$searchKey = 'name';
$searchValue = 'Иванов';
$result = array_filter($array, function($item) use($searchKey, $searchValue) {
    return $item[$searchKey] != $searchValue;
});

echo '<p>Массив с удаленным значением</p><pre>'.print_r($result, true).'</pre>';

?>

