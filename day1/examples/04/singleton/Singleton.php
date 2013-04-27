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