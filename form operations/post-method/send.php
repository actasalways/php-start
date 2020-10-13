<?php

/*
    strip_tags() - clear all of HTML tags
    htmlspecialchars() - turning HTML to harmless value
    htmlspecialchars_decode() - turning harmless HTML to normal HTML
    trim() - 
*/

#print_r($_POST);

/*
if(!$_POST['about']){
    echo ' please write something about you';
}else{
    print_r($_POST);
}
*/

#echo strip_tags($_POST['about']);
#$about = htmlspecialchars($_POST['about']);
#echo htmlspecialchars_decode($about);

function form_filter($post){
    return is_array($post) ?  array_map('form_filter',$post) : htmlspecialchars(trim($post)) ;
}

function post($name){
    if(isset($_POST[$name])){
        return $_POST[$name];
    }
};

$_POST = array_map('form_filter', $_POST);
print_r($_POST);
#echo post('name');






?>