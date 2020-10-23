<?php 

session_start();
/*
$_SESSION['user']= [
    'user_name' => 'erdem',
    'password' => '123'
];
*/

print_r($_SESSION);

/*
setcookie('member[id]', 1, 30);
setcookie('member[user_name]', 'erdem');
setcookie('member[password]', '123');
*/

print_r($_COOKIE);


?>