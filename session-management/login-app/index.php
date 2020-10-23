<?php

session_start();
ob_start();

require 'config.php';
if(isset($_SESSION['time']) &&  time() > $_SESSION['time']  ){
session_destroy();
header('Location: session-closed.php');
}else{
    $_SESSION['time'] = time() + 5; 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 
    if (isset($_SESSION['user_name'])) {
        require 'admin.php';
    }else{
        require 'login.php';
    }
?>


</body>
</html>