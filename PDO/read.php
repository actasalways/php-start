<?php 

require 'header.php';

if(!isset($_GET['id']) || empty($_GET['id'])){
    header('Location:index.php');
    exit;
}

$query = $db->prepare('SELECT * FROM lessons WHERE id = ? && confirmation = 1 ');
$query->execute([
    $_GET['id']
]);

$lesson = $query->fetch(PDO::FETCH_ASSOC);

if(!$lesson){
    header('Location:index.php');
    exit;
}

?>


<h3><?= $lesson['title'] ?></h3>
<div>
    <strong>Puslish Date : 
        <?= $lesson['date'] ?>
    </strong>    
    <br>
    <?= nl2br($lesson['context']) ?>
    
</div>