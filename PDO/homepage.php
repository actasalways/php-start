<?php

#fetch() 
#fetchAll()
#prepare - execute 

$lessons =  $db-> query('SELECT lessons.id,lessons.title,categories.namee as category_name,lessons.confirmation FROM lessons
INNER JOIN categories ON categories.id = lessons.category_id
ORDER BY lessons.id DESC')->fetchAll(PDO::FETCH_ASSOC);


/*
$query = $db->prepare('SELECT * FROM lessons WHERE id = ?');
$query->execute([
    2
    ]);
    $lessons = $query->fetch(PDO::FETCH_ASSOC);
*/


?>

<h3>Ders Listesi</h3>


<?php if($lessons): ?>

<ul>
    <?php foreach($lessons as $lesson): ?>
        <li>
            <?=$lesson['title'] ?> (<?=$lesson['category_name'] ?>)
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
    <div>
        No Courses Yet
    </div>

<?php endif; ?> 
