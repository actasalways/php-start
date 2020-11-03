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
$lesson_categories = explode(',', $lesson['category_id'] );

$categories = $db->query('SELECT * FROM categories ORDER BY namee ASC')->fetchAll(PDO::FETCH_ASSOC);
#print_r($categories);
#print_r($_POST);

if(!$lesson){
    header('Location:index.php');
    exit;
}

if(isset($_POST['submit'])){
    $title = $_POST['title'] ?? $lesson['title'];
    $context = $_POST['context'] ?? $lesson['context'];
    $confirmation = isset($_POST['confirmation']) ? $_POST['confirmation'] : $lesson['confirmation'] ;
    $category_id = isset($_POST['category_id']) && is_array($_POST['category_id']) ? implode(',', $_POST['category_id']) : null ;


    if(!$title){
        echo 'add title';
    }elseif (!$context) {
        echo 'add context';
    }elseif (!$category_id) {
        echo 'Select Category';
    }else{

        $query = $db->prepare('UPDATE lessons SET
title = ?,
context = ?,
category_id = ?,
confirmation = ?
WHERE id = ?');


$update = $query->execute([
    $title,
    $context,
    $category_id,
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
        <input type="text" value="<?= isset($_POST['title']) ? $_POST['title'] :  $lesson['title'] ?>" name="title">
        <br><br>
    Context : <br>
        <textarea name="context"  cols="30" rows="10"><?=isset($_POST['context']) ? $_POST['context'] :  $lesson['context'] ?></textarea>
        <br><br>
    Categories : <br>
        <select name="category_id[]" multiple size="4">
            <?php foreach($categories as $category): ?>
                <option <?= in_array($category['id'], $lesson_categories) ? 'selected' : ''   ?> value="<?=$category['id'] ?>"> <?= $category['namee'] ?> </option>
            <?php endforeach; ?>
        </select>
        <br><br>
    Confirmation : <br>
        <select name="confirmation" id="">
            <option <?= $lesson['confirmation'] == 1 ? 'selected' : null ?> value="1">confirmated</option>
            <option <?= $lesson['confirmation'] == 0 ? 'selected' : null ?>  value="0">not confirmated</option>
        </select>
        <br><br>
    
    <input type="hidden" name="submit" value="1">
    <button type="submit"> Update </button>

</form>

