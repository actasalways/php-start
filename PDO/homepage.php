<?php

require 'header.php';

#fetch() 
#fetchAll()
#prepare - execute 

$lessons =  $db-> query('SELECT * FROM lessons')->fetchAll(PDO::FETCH_ASSOC);


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
            <?=$lesson['title'] ?>
            <?php if($lesson['confirmation']): ?>
                <a href="index.php?page=read&id=<?=$lesson['id'] ?>">[READ]</a>
                <?php endif; ?>
                <a href="index.php?page=update&id=<?=$lesson['id'] ?>">[UPDATE]</a>
                <a href="index.php?page=delete&id=<?=$lesson['id'] ?>">[DELETE]</a>
            </li>
    <?php endforeach; ?>
</ul>

<?php else: ?>
    <div>
        No Courses Yet
    </div>

<?php endif; ?> 
