<form action="" method="get">
    <input type="text" value="<?= isset($_GET['start']) ? $_GET['start'] : ''  ?>" class="date" name="start" placeholder="Start" >
    <input type="text" value="<?= isset($_GET['end']) ? $_GET['end'] : ''  ?>" class="date" name="end" placeholder="Start" >
    <br><br>

    <input type="text" value="<?= isset($_GET['search']) ? $_GET['search'] : ''  ?>" name="search" placeholder="Search...">
    <button type="submit">Search</button>


</form>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( ".date" ).datepicker({
        datefmt_format: 'yy-mm-dd'
    });
  } );

</script>

<?php

#fetch() 
#fetchAll()
#prepare - execute 

$where = []; 
$sql = 'SELECT lessons.id,lessons.title,categories.namee as category_name,lessons.confirmation 
FROM lessons
INNER JOIN categories
ON FIND_IN_SET(categories.id, lessons.category_id)';


$sql = 'SELECT lessons.id,lessons.title,lessons.confirmation,
GROUP_CONCAT(categories.namee) as category_name,
GROUP_CONCAT(categories.id) as category_id
FROM lessons 
INNER JOIN categories
ON FIND_IN_SET(categories.id, lessons.category_id)';

if(isset($_GET['search']) || !empty($_GET['search'])){
    $where [] = ' (lessons.title LIKE "%'. $_GET['search'].'%" || lessons.context LIKE "%'. $_GET['search'].'%") ';
}
if(isset($_GET['start']) && !empty($_GET['start']) && isset($_GET['end']) && !empty($_GET['end'])){
    $where[] = 'lessons.date BETWEEN "'. $_GET['start']. ' 00:00:00" AND "'. $_GET['end']. ' 23:59:59"';
}
if(count($where) > 0){
    $sql .= ' WHERE '. implode(' && ', $where);
}


$sql .= ' GROUP BY lessons.id ORDER BY lessons.title DESC';

#print_r($where);
#echo $sql;

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
            <?=$lesson['title'] ?> 
            <?php 
                $category_names = explode(',', $lesson['category_name']);
                $category_ids = explode(',', $lesson['category_id']);

                foreach($category_names as $key => $val){
                    echo '<a href="index.php?page=category&id='. $category_ids[$key]. '"> - '. $val. '  </a>'; 
                }
            ?>
            (<?=$lesson['category_id'] ?>)
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
