<?php

session_start();
ob_start();


require 'config.php';


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
        include 'admin.php';
    }else{
        include 'login.php';
    }
?>


</body>
</html>