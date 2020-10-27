<?php 

if(!isset($_GET['id']) || empty($_GET['id'])){
    header('Location:index.php');
    exit;
}

$query = $db->prepare('DELETE FROM lessons WHERE id= ?');
$query->execute([
    $_GET['id']
]);

header('Location:index.php');

?>