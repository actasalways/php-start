<?php 

for ($i=0; $i < 10; $i++) { 
    if ($i==3) continue ;
    #echo $i .'<br>';
    if($i==6) break;
}


$sayilar = [1,2,3,4,5,6,7,8,9,10];

foreach($sayilar as $sayi){
    #echo $sayi .'<br>';
}


$userDetail=[
    'name' => 'Erdem',
    'surname' => 'Bektaş',
    'age' => 23
];

foreach ($userDetail as $key => $value) {
    #echo $key .':' .$value .'<br>' ;
}


$a=10;
/*
while ($a > 0) {
    echo $a .'<br>'; 
    $a--;
}
*/
while ($a > 0):
    #echo $a .'<br>'; 
    $a--;
endwhile;

$i = 6;
do {
    echo $i .'<br>';
    $i++;
} while ($i <= 5);


?>
