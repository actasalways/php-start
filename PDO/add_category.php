<?php

if(isset($_POST['namee'])){
    if(empty($_POST['namee'])){
        echo 'Please Specify Category Name';
    }else{

        $query = $db->prepare('INSERT INTO categories SET namee = ?');
        $add = $query->execute([
            $_POST['namee'] 
        ]);

        if($add){
            header('Location:index.php?page=categories');
        }else{
            echo 'Category Could Not be Added';
        }

    }
}


?>

<form action="" method="post">
    <input type="text" name="namee">
    <br><br>
    <button type="submit">Send</button>

</form>