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

$categories = $db->query('SELECT * FROM categories ORDER BY namee ASC')->fetchAll(PDO::FETCH_ASSOC);
#print_r($categories); 


if(isset($_POST['submit'])){
    $title = $_POST['title'] ?? null;
    $context = $_POST['context'] ?? null;
    $confirmation = isset($_POST['confirmation']) ? $_POST['confirmation'] : 0 ;
    $category_id = isset($_POST['category_id']) && is_array($_POST['category_id']) ? implode(',', $_POST['category_id']) : null ;

    if(!$title){
        echo 'add title';
    }elseif (!$context) {
        echo 'add context';
    }elseif (!$category_id) {
        echo 'Select Category';
    }else{
        $query = $db->prepare('INSERT INTO lessons SET
        title = ?,
        context = ?,
        confirmation = ?,
        category_id = ?
        ');
    
        $add = $query -> execute([
            $title, $context, $confirmation,$category_id
        ]);

        $lastId = $db->lastInsertId();

        if($add){
            header('Location:?page=read&id='. $lastId);
        }else{
            $err = $query->errorInfo();
            #echo 'MySQL Error ' . $err[2]; 
            print_r($err);
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
    Categories : <br>
    <select name="category_id[]" multiple size="4">
        <?php foreach($categories as $category): ?>
            <option value="<?=$category['id'] ?>"> <?= $category['namee'] ?> </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    Confirmation : <br>
        <select name="confirmation" id="">
            <option value="1">confirmated</option>
            <option value="0">not confirmated</option>
        </select>
        <br><br>
    
    <input type="hidden" name="submit" value="1">
    <button type="submit">Send</button>

</form>