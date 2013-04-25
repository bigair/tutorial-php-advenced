<?php

class A
{
    public static function __callStatic($name, $args)
    {
        var_dump($name, $args);
    }
}

A::notExistsMethod(123, 456);
