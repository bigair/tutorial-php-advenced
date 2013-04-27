<?php
class A
{
    private $_attr1 = 123;
    protected $_attr2 = 456;
    public $attr3 = 789;
    public static $attr4 = 'abc';

    public function test()
    {
        echo $this->_attr1, "\n";
        echo $this->_attr2, "\n";
    }
}

class B extends A
{
    public function test2()
    {
        echo $this->_attr1, "\n";
        echo $this->_attr2, "\n";
    }
}

$a = new A();
$b = new B();

$a->test();
echo $a->attr3, "\n";

$b->test2();
echo $b->attr3, "\n";

A::$attr4 = 'def';
echo B::$attr4, "\n";