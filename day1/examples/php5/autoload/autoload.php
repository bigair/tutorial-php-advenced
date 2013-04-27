<?php

defined('CLASSES_PATH') || define('CLASSES_PATH', __DIR__);

function loadClass($className)
{
    $className = str_replace('\\', '/', $className);
    $classPath = CLASSES_PATH . '/' . $className . '.php';
    echo $classPath . PHP_EOL;
    if (file_exists($classPath)) {
        include $classPath;
        return true;
    }
    return false;
}

spl_autoload_register('loadClass');

$car = new AutoloadExample\Car();
$human = new AutoloadExample\Human();
// $animal = new AutoloadExample\Animal();
var_dump($car, $human);