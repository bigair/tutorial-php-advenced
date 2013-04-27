<?php
class A
{
    const MY_CONSTANT = 123;

    public function showContant()
    {
        echo self::MY_CONSTANT, "\n";
    }
}

$a = 'A';
echo $a::MY_CONSTANT, "\n";

$a = new A();
echo $a->MY_CONSTANT, "\n"; // error
$a->showContant();
