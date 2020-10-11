<?php

/*
    printf() - making possible to use variable in string by parameters.
    sprintf() - like a printf() but need "echo" to print
    vprintf() - use to manipulate a string
    vsprintf() - like a vprintf() but need "echo" to print
*/


$place = 'Africa';
$num = 5;
$type = 'monkeys';

//echo 'There are ' . $num . ' ' . $type . ' in ' . $place . '.';

//printf('there are %d %s in %s .',  5, 'monkeys', 'africa');
//echo '<br>';
//printf('There are %2$d %3$s in %1$s.', 'Africa', 5, 'monkeys');

$date = '2020-10-11';
//echo vsprintf('%d-%02d-%02d', explode('-', $date));

//echo sprintf('Pi is %.2f .', 3.14);

