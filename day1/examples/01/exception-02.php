<?php


class A
{
    public function testException()
    {
        throw new Exception('test');
    }
}

class B
{
    public function testException()
    {
        $a = new A();
        $a->testException();
    }
}

try {
    $b = new B();
    $b->testException();
} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}