<?php
class A
{
    private $_num1 = null;

    public function register($num1)
    {
        $this->_num1 = $num1;
    }

    protected function __invoke($num2)
    {
        return $this->_num1 + $num2;
    }
}

$a = new A();

var_dump(is_callable($a));

$a->register(10);
echo $a(2), "\n";
echo $a(3), "\n";

$a->register(100);
echo $a(2), "\n";
echo $a(3), "\n";
