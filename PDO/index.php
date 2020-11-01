<?php 

ob_start();

require_once 'header.php';
require_once 'connect.php';

$_GET = array_map(function($get){
    return htmlspecialchars(trim($get)); 
},$_GET);



if(!isset($_GET['page'])){
    $_GET['page'] = 'index';
}

#print_r($_GET);


switch ($_GET['page']) {
    case 'index':
        require_once 'homepage.php';
        break;

    case 'insert':
        require_once 'insert.php';
        break;
    
    case 'read':
        require_once 'read.php';
        break;

    case 'update':
        require_once 'update.php';
        break;

    case 'delete':
        require_once 'delete.php';
        break;

    case 'categories':
        require_once 'categories.php';
        break;
    case 'add_category':
        require_once 'add_category.php';
        break;
    case 'category':
        require_once 'category.php';
        break;
}

?>
