<?php

/*
    array_values() - print value and start key from 0 to regular everytime
    array_push() - add value in array
    array_unshift() - add value to array's first index.
    array_keys() - getting key's value
    current() - getting first value of array
    end() - getting last value of array
    next() - getting next value every using
    prev() - getting preview value every using
    reset() - reset all of next&preview func.
    extract() - turning array key to variable. can use directly by key name.
    asort() - sorting value a-z
    arsort() - sorting value z-a
    ksort() - sorting key a-z
    krsort() - sorting key z-a
*/

$arr = [
    'name' => 'erdem',
    'surname' => 'bektas'
];

$arr2 = array_values($arr);
$arr = ['erdem','bektas','erdem','bektas','developer'];
//print_r($arr);
$arr2 = array_unique($arr);
//print_r(array_values($arr2));

$arr = ['erdem','bektas'];
array_push($arr, 'erdem', 'developer');
$arr['key'] = 'new value';
//print_r($arr);

$arr = ['erdem','bektas'];
array_unshift($arr, 'developer');
//print_r($arr);
$arr2 = [
    'site' => 'udemy'
];
$arr = array_merge($arr2, $arr);
//print_r($arr);

$arr = [
    'name' => 'erdem',
    'surname' => 'bektas',
    'a' => [
        'b' => 'c',
        'd' => [
            'e' => 'f'
        ]
    ]
];

$keys = array_keys($arr);

function _array_keys($arr)
{
    static $keys = [];
    foreach ($arr as $key => $val){
        array_push($keys, $key);
        if (is_array($val)){
            _array_keys($val);
        }
    }
    return $keys;
}

$keys = _array_keys($arr);
//print_r($keys);

$arr = ['erdem','bektas', 'developer', '23'];
/*
echo current($arr) . '<br>';
echo next($arr) . '<br>';
echo next($arr) . '<br>';
echo prev($arr) . '<br>';
echo next($arr) . '<br>';
reset($arr);
echo next($arr) . '<br>';
//echo end($arr);
*/

$arr = [
    'name' => 'erdem',
    'surname' => 'bektas'
];
extract($arr);
//echo $name;

$arr = [3,1,6,4];
//print_r($arr);
//asort($arr);
//arsort($arr);
//print_r($arr);

$arr = [
    'c' => 'val 3',
    'a' => 'val 1',
    'b' => 'val 2'
];
krsort($arr);
print_r($arr);


