<a href="index.php?page=add_category" > [ Add Category ] </a>


<?php 

$categories = $db->query('SELECT categories.*,COUNT(lessons.id) as total_lesson  FROM categories
LEFT JOIN lessons ON FIND_IN_SET(categories.id, lessons.category_id)
GROUP BY categories.id')->fetchAll(PDO::FETCH_ASSOC);


?>

<ul>
    <?php foreach ($categories as $category): ?>
        <li>
            <a href="index.php?page=category&id=<?= $category['id'] ?>">
                <?= $category['namee'] ?> (<?=$category['total_lesson'] ?>)
            </a>
        </li>
    <?php endforeach; ?>

</ul>