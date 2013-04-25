<?php
class A
{
    public static function test()
    {
        static::show();
    }

    public static function show()
    {
        echo "This is A";
    }
}

class B extends A
{
    public static function show()
    {
        echo "This is B";
    }
}

B::test();
