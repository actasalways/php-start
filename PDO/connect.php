<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=lessons','root','root'); 
} catch (PDOException $e) {
    $e -> getMessage(); 
}


?>
