<?php

/*
$query = $db -> prepare('INSERT INTO lessons SET 
title = ?,
context = ?,
confirmation = ?
');

$add = $query -> execute ([
    'test title',
    'test context',
    3
    ]);
    
    if($add){
        echo 'data added';
    }else{
        $err = $query->errorInfo();
        echo 'MYSQL ERROR '. $err[2];
        
    }
*/


if(isset($_POST['submit'])){
    $title = $_POST['title'] ?? null;
    $context = $_POST['context'] ?? null;
    $confirmation = isset( $_POST['confirmation']) ? 1 : 0 ;
    if(!$title){
        echo 'add title';
    }elseif (!$context) {
        echo 'add context';
    }else{
        $query = $db->prepare('INSERT INTO lessons SET
        title = ?,
        context = ?,
        confirmation = ?
        ');
    
        $add = $query -> execute([
            $title, $context, $confirmation
        ]);

        if($add){
            header('Location : index.php');
        }else{
            $err = $query->errorInfo();
            echo 'MySQL Error ' . $err[2]; 
        }

    }
}

    
?>
    
<form action="" method="post">
    Title : <br>
        <input type="text" value="<?= isset($_POST['title']) ? $_POST['title'] : null ?>" name="title">
        <br><br>
    Context : <br>
        <textarea name="context" value="<?= isset($_POST['context']) ? $_POST['context'] : null ?>" cols="30" rows="10"></textarea>
        <br><br>
    Confirmation : <br>
        <select name="confirmation" id="">
            <option value="0">not confirmated</option>
            <option value="1">confirmated</option>
        </select>
        <br><br>
    
    <input type="hidden" name="submit" value="1">
    <button type="submit">Send</button>

</form>