<?php

/*
    mkdir(folder_name, chmod) - create directory
    rmdir()
*/

#mkdir('test'); - create folder named "test"
#rmdir('test'); - deleted folder named "test"

#mkdir('test2', 0777); - public folder

/*
    file_exists() - to check file 
*/

if(file_exists('test2')){
    echo 'file is exist';
    rmdir('test2');
}