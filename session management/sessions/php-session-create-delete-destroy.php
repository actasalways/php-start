<?php

session_start();

$_SESSION['user_name'] = 'erdem';
$_SESSION['password'] = 'bektas';
#echo $_SESSION['user_name'];

print_r($_SESSION);
unset($_SESSION['password']);
print_r($_SESSION);


#session_destroy();


?>
