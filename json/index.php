<?php 
/*
$erdem = [
    "name" => "erdem",
    "surname" => "bektas",
    "jobs" => [
        [
            
            "job" => "back-end developer",
            "api" => "api con"
        ],
        [
            
            "job" => "front-end developer",
            "design" => "page design"
            ]
            ]
        ];
*/
#echo json_encode($erdem);

$json = '{
    "name" : "erdem",
    "surname" : "bektas",
    "jobs" : [
        {
            "job" : "back-end developer",
            "api" : "api con"
        },
        {
            "job" : "front-end developer",
            "design" : "page design"
        }
    ]

}'; 


$arr = json_decode($json, true);
print_r($arr);


?>