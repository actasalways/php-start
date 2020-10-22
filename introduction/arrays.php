<?php 

$id = array(
    "Erdem",
    "Bektaş",
    "Developer",
    "23"
 );

$id2 = [
    'name' => "Erdem",
    'surname' => "Bektaş",
    'job'=> "Developer",
    'age' => 23   
];
/* 
echo $id[0]; 
echo "\n";
print_r($id);

echo $id2['name'];
echo "\n";
print_r($id2);
*/


$numbers = array(1,2,3);
$numbers2 = [1,2,3];


$categories = [
    'websites' => [
        'e-commerce'=>[
            'Amazon',
            'Alibaba',
            'n11'
        ],
        'education'=>[
            'Udemy',
            'Prototurk',
            '93academy'
        ]
    ]
];

/*
echo $categories['websites']['education'][0];
echo "\n\n";
print_r($categories);
*/
define('USER',[
    'name' => "Erdem",
    'surname' => "Bektaş",
    'job'=> "Developer",
    'age' => 23  
]);
echo USER['name'];


?>
