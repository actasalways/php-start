<?php 


if(isset($_POST['submit'])){
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!$user_name || !$password){
        $error = 'fields cannot be blank';
    }elseif ($user_name != $member['user_name']) {
        $error = 'username is invalid';
    }elseif ($password != $member['password']) {
        $error = 'password is invalid';
    }else{
        $_SESSION['time'] = time() + 5;
        $_SESSION['user_name'] = $member['user_name'];
        //header()
        header('Location: index.php ');


    }
    
}


?>
<?php if(isset($error)): ?>
    <div style="border: 1px solid red">
        <?php echo $error ?> 
    </div>
<?php endif; ?>  

<form action="" method="post">
    Username : <br>
    <input type="text" name="user_name">
    <br>
    <br>
    Password :<br>
    <input type="text" name="password">
    <hr>    
    <input type="hidden" name="submit" value="1">
    <button type="submit">Login</button>
</form>