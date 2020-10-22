<?php

/*
    touch() - create file
*/

    #touch('test.txt');
    #touch('test2.txt', time() - 84000); // second param changing create date

/*
    r  - open for read
    r+ - open for read and write
    w  - open for write(will create if file not exists, if exists, create again from zero)
    w+ - open for read and write
    a  - open for write
    a+ - open for read and write
*/

/*
fopen()    - open file
    fclose()   - close file
    fwrite()   - type in file
    fread()    - read file
    fgets()    - read line by line
    feof()     - checking is file readed till end
    filesize() - return in file character size
    unlink()   - delete file
*/

/*
    file_get_contents()
    file_put_contents()
*/


#$dosya = fopen('test.txt','r');
$content = 'this is an example.';
$content2 = 'this is an example 2.';
#fwrite($dosya,$content2);
#echo fread($dosya, filesize('test.txt'));
#fclose($dosya);


$content = "this is an example " . rand(0,1000) . "\n";
$dosya = fopen('test.txt','a+');
#fwrite($dosya,$content);
/*
echo fgets($dosya);
echo fgets($dosya);
echo fgets($dosya);
echo fgets($dosya);
echo fgets($dosya);
echo fgets($dosya);
*/

print_r(feof($dosya));

/*
    while(!feof($dosya)){
        echo fgets($dosya) . '<br>';
    }
*/

#unlink('test2.txt');

$values = file('test.txt');
#print_r($values);
fclose($dosya);

#$contents = file_get_contents('http://erdembektas.com');
#echo $contents;

file_put_contents('test.txt', 'new value', FILE_APPEND);


