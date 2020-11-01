<form action="" method="get">
    <input type="text" value="<?= isset($_GET['search']) ? $_GET['search'] : ''  ?>" name="search" placeholder="Search...">
    <button type="submit">Search</button>
</form>


<?php

#fetch() 
#fetchAll()
#prepare - execute 

$sql = 'SELECT lessons.id,lessons.title,categories.namee as category_name,lessons.confirmation FROM lessons
INNER JOIN categories ON categories.id = lessons.category_id';
if(isset($_GET['search'])){
    $sql .= ' WHERE lessons.title LIKE "%'. $_GET['search'].'%" || lessons.context LIKE "%'. $_GET['search'].'%" ';
}
$sql .= ' ORDER BY lessons.id DESC';


$lessons =  $db-> query($sql)->fetchAll(PDO::FETCH_ASSOC);


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
      <?php  if(isset($_GET['search'])): ?>
            No Courses Avaible to search 
        <?php else : ?>
            No Courses Yet
        <?php endif ; ?> 
    </div>

<?php endif; ?> 
