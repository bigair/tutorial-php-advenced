<?php
class A
{
    public function register($num1)
    {
        return function ($num2) use ($num1) {
            return $this->_add($num1, $num2);
        };
    }

    protected function _add($num1, $num2)
    {
        return $num1 + $num2;
    }
}

$a = new A();
$callback1 = $a->register(10);
$callback2 = $a->register(100);

echo $callback1(2), "\n";
echo $callback2(2), "\n";

echo $callback1(3), "\n";
echo $callback2(3), "\n";
