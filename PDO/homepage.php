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

<ul>
    <?php foreach($lessons as $lesson): ?>
        <?php if($lesson['confirmation'] == 1): ?>
            <li>
                <?=$lesson['title'] ?>
                <a href="index.php?page=read&id=<?=$lesson['id'] ?>">[READ]</a>
                <a href="index.php?page=update&id=<?=$lesson['id'] ?>">[UPDATE]</a>
                <a href="">[DELETE]</a>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
