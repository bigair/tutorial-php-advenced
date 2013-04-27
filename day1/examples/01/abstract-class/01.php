<?php

abstract class AbstractClass
{
    abstract public function test();
}

class ConcreteClass extends AbstractClass
{
    public function test()
    {
        echo "test\n";
    }
}

$a = new ConcreteClass();
$a->test();