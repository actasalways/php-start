<?php 

if(!isset($_GET['id']) || empty($_GET['id'])){
    header('Location:index.php?page=categories');
    exit;
}

$query = $db->prepare('SELECT * FROM categories
WHERE id = ?');
$query->execute([
    $_GET['id']
]);

$category = $query->fetch(PDO::FETCH_ASSOC);
if(!$category){
    header('Location:index.php?page=categories');
    exit;
}
$query = $db->prepare('SELECT * FROM lessons
WHERE category_id = ? 
ORDER BY id DESC');
$query->execute([
    $category['id']
]);

$lessons = $query->fetchAll(PDO::FETCH_ASSOC);
#print_r($lessons);

?>

<h3><?=$category['namee'] ?> Category </h3>
<?php if($lessons): ?> 

    <ul>
        <?php foreach($lessons as $lesson):  ?>
            <li>
                <?=$lesson['title'] ?> 
                <div>
                    </div>
                    <?php if($lesson['confirmation']): ?>
                        <a href="index.php?page=read&id=<?=$lesson['id'] ?>">[READ]</a>
                        <?php endif; ?>
                        <a href="index.php?page=update&id=<?=$lesson['id'] ?>">[UPDATE]</a>
                        <a href="index.php?page=delete&id=<?=$lesson['id'] ?>">[DELETE]</a>
                        <br><br>
                </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>

    There is No Courses in This Category

<?php endif;?>