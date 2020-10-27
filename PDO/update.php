<?php 

if(!isset($_GET['id']) || empty($_GET['id'])){
    header('Location:index.php');
    exit;
}

$query = $db->prepare('SELECT * FROM lessons 
WHERE id = ?');
$query->execute([
    $_GET['id']
]);

$lesson = $query->fetch(PDO::FETCH_ASSOC);

#print_r($lesson);

if(!$lesson){
    header('Location:index.php');
    exit;
}

if(isset($_POST['submit'])){
    $title = $_POST['title'] ?? $lesson['title'];
    $context = $_POST['context'] ?? $lesson['context'];
    $confirmation = isset($_POST['confirmation']) ? $_POST['confirmation'] : 0 ;
    if(!$title){
        echo 'add title';
    }elseif (!$context) {
        echo 'add context';
    }else{

        $query = $db->prepare('UPDATE lessons SET
title = ?,
context = ?,
confirmation = ?
WHERE id = ?');

$update = $query->execute([
    $title,
    $context,
    $confirmation,
    $lesson['id']
]);
    
    if($update){
        #echo 'update is succuessful';
        header('Location:index.php?page=read&id='. $lesson['id']);
    }else{
        echo 'update is NOT succuessful';
    }

    }
}


/*
$query = $db->prepare('UPDATE lessons SET
title = ?,
context = ?,
confirmation = ?
WHERE id = ?');

$update = $query->execute([
    'new title',
    'new context',
    1,
    1
    ]);
    
    if($update){
        echo 'update is succuessful';
    }else{
        echo 'update is NOT succuessful';
    }
*/


?>

<form action="" method="post">
    Title : <br>
        <input type="text" value="<?= isset($_POST['title']) ? $_POST['title'] : $lesson['title'] ?>" name="title">
        <br><br>
    Context : <br>
        <textarea name="context" value="<?= isset($_POST['context']) ? $_POST['context'] : $lesson['context'] ?>" cols="30" rows="10"></textarea>
        <br><br>
    Confirmation : <br>
        <select name="confirmation" id="">
            <option <?= $lesson['confirmation'] == 0 ? 'selected' : null   ?>  value="0">not confirmated</option>
            <option <?= $lesson['confirmation'] == 1 ? 'selected' : null ?> value="1">confirmated</option>
        </select>
        <br><br>
    
    <input type="hidden" name="submit" value="1">
    <button type="submit"> Update </button>

</form>

