<?php

/*
    array_map() - manipulate to array with function
    array_filter() - clear null value or can make filter func in second param but keys still same
    array_merge() - merging 2 array
    array_rand() - getting random key
    array_reverse() - getting reverse data
    array_search() - return key of searching value. Purpose is only check
    in_array() - checking if value have
    array_shift() - remove first value
    array_pop() - remove last value
    array_slice() - print after skip value
    array_sum() - sum of array values
    array_product() - multiplication of array values
    array_unique() - delete repeated value
*/

function filter($val){
    return $val . ' -';
}

$arr = [1,2,3,4,5];
$arr2 = array_map('filter', $arr);
$arr2 = array_map(function($val){
    return $val . ' -';
}, $arr);
//print_r($arr2);

$arr = [1,2,3,4,5];
$arr2 = array_filter($arr, function($item){
    return $item > 2 && $item < 5;
});
$arr2 = array_map(function($val){
    if ($val > 2 && $val < 5){
        return $val;
    }
}, $arr);
//print_r($arr2);

$arr1 = [1,2,3];
$arr2 = [4,5,6];

$arr = array_merge($arr1, $arr2);
//print_r($arr);

$arr = [
    'name' => 'erdem',
    'surname' => 'bektas',
    'age' => 23,
    'site' => 'erdembektas.com'
];
$random = array_rand($arr, 2);
$values = array_map(function($key) use($arr){
    return $arr[$key];
}, $random);

//print_r($values);

$arr = [1,2,3,4,5];
//print_r($arr);
$arr = array_reverse($arr);
//print_r($arr);

$arr = [
    'name' => 'erdem',
    'surname' => 'bektas',
    'a' => [
        'b' => [
            'c' => 'd'
        ]
    ]
];

$test = array_search('d', $arr);

function _array_search($cur_val, $arr)
{
    foreach ($arr as $key => $val){
        if ($val == $cur_val){
            return true;
        }
        if (is_array($val)){
            return _array_search($cur_val, $val);
        }
    }
    return false;
}

$test = _array_search('d', $arr);
//echo $test;

$arr = [1,2,3,4];

/*
if (in_array('6', $arr))
{
    echo '3 val var';
} else {
    echo 'not';
}
*/

$arr = [1,2,3,4,5];
//$first_element = array_shift($arr);
$last_element = array_pop($arr);
//print_r($arr);
//echo $last_element;
//echo $first_element;

$arr = [1,2,3,4,5];

#execlude 2 element from head
$arr2 = array_slice($arr, 2);
//print_r($arr2);

$arr3 = array_slice($arr, 2, 2);
//print_r($arr3);

$arr4 = array_slice($arr, -2);
//print_r($arr4);

$arr = [1,2,3,4,5];
#echo array_sum($arr);
#echo array_product($arr);


$arr = ['erdem','bektas','erdem','bektas','developer'];
print_r($arr);
$arr2 = array_unique($arr);
print_r($arr2);