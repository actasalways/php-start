<?php

/*
    print_r() - printing array
    var_dump() - printing array with details
    explode() - exploding array by selected character
    implode() - merging array to string by selected character
    count() - getting length of array
    is_array() - is this array?
    shuffle() - mixing values of array
    array_combine() - firs array's index is getting key of second array's index
    array_count_values() - counting same data
    array_flip() - change place of key and value
    array_key_exists() - check a key name - but not working in subarrays
*/

$arr = [
    'name' => 'erdem',
    'surname' => 'bektas',
    'age' => 23,
];

print_r($arr);
var_dump($arr);

$test = 'erdem,bektas,developer';
$arr = explode(',', $test);

//print_r($arr);

$string = implode('|', $arr);
//echo $string;
//echo count($arr);

/*
if (is_array($arr)){
    echo 'this is an array';
} else {
    echo 'this is a not array';
}
*/

$arr = [1,2,3,4,5,6,7,8,9,10];
shuffle($arr);
//print_r($arr);

$keys = ['name', 'surnam'];
$values = ['erdem', 'bektas'];

$arr = array_combine($keys, $values);
//print_r($arr);

$arr = ['erdem','bektas','develoer','erdem','bektas'];
$arr2 = array_count_values($arr);
//print_r($arr2);

$arr = [
    'name' => 'erdem',
    'surname' => 'bektas',
    'age' => 23,
];
$arr2 = array_flip($arr);
//print_r($arr2);

$arr = [
    'name' => 'erdem',
    'a' => [
        'b' => [
            'c' => [
                'd' => 'e',
                'e' => 'f'
            ]
        ]
    ]
];


/*
if (array_key_exists('c', $arr)){
    echo 'key exist';
} else {
    echo 'key not exist';
}
*/

function _array_key_exists($cur_key, $arr){
    foreach ($arr as $key => $val){
        if ($key == $cur_key){
            return true;
        }
        if (is_array($val)){
            return _array_key_exists($cur_key, $val);
        }
    }
    return false;
}

if (_array_key_exists('e', $arr)){
    echo 'has c ';
} else {
    echo "has not c" ;
}


?>

