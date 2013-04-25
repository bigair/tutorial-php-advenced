<?php

class A
{
    public static function log($message)
    {
        echo '[', date('Y-m-d H:i:s') . "] $message\n";
    }

    public function showMessage($message)
    {
        echo "$message\n";
    }
}

function getName()
{
    return 'log';
}

$name = 'log';

A::$name('test');

A::{getName()}('test');

(new A())->showMessage('test');
