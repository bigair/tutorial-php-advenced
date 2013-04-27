<?php

trait Singleton
{
    protected static $_instance = null;

    public static function getInstance()
    {
        if (static::$_instance === null
                || !(static::$_instance instanceof static)) {
            static::$_instance = new static();
        }
        return static::$_instance;
    }
}

class A
{
    use Singleton;

    private function __construct()
    {
    }
}

$a = A::getInstance();
var_dump ($a instanceof A);
var_dump ($a instanceof Singleton);
var_dump (is_a($a, 'Singleton'));