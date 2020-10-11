<?php

/*
    strlen() - length
    strstr() - printing after words from selected character in checking value
    strpos() - getting index in searching character in variable
    ucwords() - upper first character of words
    ucfirst() - upper only first character
    strtolower() - lower all of characters
    strtoupper() - upper all of characters
    trim() - cleaning left and right space
    ltrim() - cleaning left space
    rtrim() - cleaning right space
    substr() - divide string value
    str_replace() - replace selected word to target word in value
    str_repeat() - repeat selected character as much as decided
*/

$str = 'erdem bektas';

//echo strlen($str);
//echo strlen('erdembektas');
//echo strpos('erdem bektas', 'n');
//$str = strtoupper($str);
//echo strtolower($str);

$str2 = "-erdem-bektas-";
//echo rtrim($str2, '-');
//echo substr($str, 0, -4);

$str3 = 'erdem bektas, engin bektas';

$str3 = str_replace(
    ["erdem","bektas","developer"],
    ["engin", "bektas", "student"],
    $str3
);

for ($i = 1; $i <= 10; $i++){
    $repeatCount = ($i <= 5 ? $i : (10 - $i));
    echo str_repeat('-*0', $repeatCount) . '<br>';
}

