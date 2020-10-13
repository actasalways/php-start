<?php

function post($name){
    if(isset($_POST[$name])){
        return $_POST[$name];
    }
};


if(post('login')){
    print_r($_POST);
}



if(post('signIn')){
    print_r($_POST);
}


?>

<form action="" method="post">
    <h2> Login</h2>
        Username: 
        <input type="text" name="username">
        <br>
        <br>
        Password
        <input type="password" name="pass">
        <br>
        <br>
        <input type="hidden" name="login" value="1">
        <button type="submit">Login</button>
</form>
<hr>
<form action="" method="post">
    <h2> Sign In</h2>
        Username: 
        <input type="text" name="username">
        <br>
        <br>
        Password
        <input type="password" name="pass">
        <br>
        <br>
        E-mail: 
        <input type="text" name="email">
        <br>
        <br>
        <input type="hidden" name="signIn" value="1">
        <button type="submit">Sign In</button>
</form>

