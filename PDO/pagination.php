<?php 

#db connection
$db = new PDO('mysql:host=localhost; dbname=pagination', 'root','root');

#how many post listing in page
$limit = 10; 
$page_number = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
if($page_number <= 0){
    $page_number = 1;
}

$total_data = $db -> query('SELECT COUNT(id) as total FROM students') -> fetch(PDO::FETCH_ASSOC)['total'];
$total_page = ceil($total_data / $limit); 

$start = ($page_number * $limit) - $limit; 

#list data
$query =$db->query('SELECT * FROM students ORDER BY id DESC limit '. $start. ','. $limit)->fetchAll(PDO::FETCH_ASSOC);


foreach ($query as $data) {
    echo $data['name']. ' '. $data['id']. '<br>';
}

$left_side = $page_number - 3;
$right_side=$page_number + 3;
/*

if($page_number <= 3){
    $left_side = 7;
}
if($right_side > $total_page){
    $left_side=$total_page - 6;
}
*/

echo '<div class="pagination">';
    echo '<a href="pagination.php?page='.($page_number > 1 ? $page_number - 1 : 1) . '">Prev</a>';

for ($i=$left_side; $i <= $right_side; $i++) { 
    if($i > 0 && $i <= $total_page ){    
        echo '<a '. ($i == $page_number ? 'class="active"' : null ). ' href="pagination.php?page='.$i .'">'. $i.   '</a>';
    }     
}
    echo '<a href="pagination.php?page='.($page_number < $total_page ?  $page_number + 1 : $total_page ) . '">Next</a>';

echo '</div>';



?> 

<style>
.pagination a{
    display: inline-block;
    padding: 10px;
    background: #eee ;
    margin-right: 4px;
    color: #333;
    text-decoration: none;
}
.pagination a.active {
    background: #333;
    color: #fff ;
}

</style>