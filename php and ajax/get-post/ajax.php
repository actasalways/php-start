<?php


#echo $_POST['name']; 

$arr = [
    'name' => $_GET['name'],
    'site' => 'udemy'
];



echo json_encode($arr);
