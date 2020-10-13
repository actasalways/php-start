<?php 

function form_filter($post){
    return is_array($post) ?  array_map('form_filter',$post) : htmlspecialchars(trim($post)) ;
}

$_POST = array_map('form_filter', $_POST);

function post($name){
    if(isset($_POST[$name])){
        return $_POST[$name];
    }
};


if(post('submit')){
    print_r($_POST);
}

?>


<form action="" method="post" enctype="multipart/form-data" >

<!--
    input
    textarea
    file
    select
    radio
    checkbox
    multiple select
    button
--->

Name 
<br>
<input type="text" readonly required value="Erdem Bektas" name="name">
<hr>
<textarea name="about" cols="50" rows="10" placeholder="write about yourself" ><?=post('about') ?></textarea>
<hr>
<select name="profession" id="">
    <option  >select</option>
    <option <?php echo post('profession') == 'web-developer' ? 'selected' : null ?> value="web-developer">Web Developer</option>
    <option <?php echo post('profession') == 'front-end-developer' ? 'selected' : null ?> value="front-end-developer">Front-end Developer</option>
    <option <?php echo post('profession') == 'back-end-developer' ? 'selected' : null ?> value="back-end-developer">Back-end Developer</option>
</select>
<hr>
Gender: 
<br>
<label>
<input type="radio" checked name="gender" value="male">
    Male
</label>
<label>
<input type="radio" name="gender" value="female">
    Female
</label>
<br>
<label for="input">click here</label>
<input type="text" id="input">
<hr>

int: 
<br>
<label>
    <input type="checkbox" <?php echo in_array('php', post('interest')) ? 'checked' : null ?> name="interest[]" value="php">
        PHP
</label>
<label>
    <input type="checkbox" <?php echo in_array('html', post('interest')) ? 'checked' : null ?> name="interest[]" value="html">
        HTML
</label>
<label>
    <input type="checkbox" <?php echo in_array('css', post('interest')) ? 'checked' : null ?> name="interest[]" value="css">
        CSS 
</label>
<hr>
photo
<input type="file" name="photo">

<hr>
<select name="profession2[]" multiple size="5" >
    <option value="web-developer">Web Developer</option>
    <option value="front-end-developer">Front-end Developer</option>
    <option value="back-end-developer">Back-end Developer</option>
    <option value="web-developer">Web Developer</option>
    <option value="front-end-developer">Front-end Developer</option>
    <option value="back-end-developer">Back-end Developer</option>
    <option value="web-developer">Web Developer</option>
    <option value="front-end-developer">Front-end Developer</option>
    <option value="back-end-developer">Back-end Developer</option>
</select>
<hr>
<input type="hidden" name="submit" value="1">
<button type="submit"> Send </button>
<input type="submit" value="Send">
</form>

