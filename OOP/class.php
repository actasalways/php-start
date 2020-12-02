<?php

class Member {

    public $name;
    public $surname = 'Bektas'; 
    const age = 23;

    public function showName()
    {
        
    }

    public function showSurname()
    {
        return $this->surname;
    }

    public function sum($a=2, $b=6)
    {
        return $a + $b; 
    }

}

$member = new Member;

#echo $member->surname . '<br>';
echo Member::age. '<br>'; 
echo $member->sum(3, 5). '<br>';
echo $member->showSurname();



?>