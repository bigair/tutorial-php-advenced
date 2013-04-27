<?php

class A
{
    public function __toString()
    {
        return 'I am an object.';
    }
}

$a = new A();
echo $a;