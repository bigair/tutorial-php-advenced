<?php

defined('CLASSES_PATH')
    || define('CLASSES_PATH', __DIR__);

function loadClass1($className)
{
    $classPath = CLASSES_PATH . '/'
               . str_replace('\\', '/', $className) . '.php';
    // echo $classPath . PHP_EOL;
    if (file_exists($classPath)) {
        include $classPath;
        return true;
    }
    return false;
}

function loadClass2($className)
{
    $classPath = strtolower($className) . '.class.php';
    // echo $classPath . PHP_EOL;
    if (file_exists($classPath)) {
        include $classPath;
        return true;
    }
    return false;
}

function notExistsClass($className)
{
    echo "Class '$className' not exists." . PHP_EOL;
    eval('class ' . $className . '{}');
    return true;
}

spl_autoload_register('loadClass1');
spl_autoload_register('loadClass2');
spl_autoload_register('notExistsClass');

var_dump(spl_autoload_functions());

$car = new AutoloadExample\Car();
$human = new AutoloadExample\Human();
$test = new Test();
$hello = new Hello();
