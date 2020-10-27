<?php 

ob_start();

require_once 'connect.php';


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
    

}

?>
