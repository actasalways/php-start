<a href="index.php">Homepage </a> | 
<a href="about">About </a> |
<a href="contact">Contact </a> |
<hr>


<div style="background-color: #B6B8D4;">
<?php

if(!isset($_GET['page'])){
    $_GET['page']='index'; 
}

/*
$pageh = explode('/', $_GET['page']);
$page = $pageh[0];
*/

#$page
switch ($_GET['page']) {
    case 'index':
        require_once 'homepage.php';
        break;
    
    case 'about':
        require_once 'about.php';
        break;
    
    case 'contact':
        require_once 'contact.php';
        break;

    case 'subject':
        require_once 'subject.php';
        break;

    default:
        # code...
        break;
}


?>
</div>
