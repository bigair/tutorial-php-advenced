<?php

spl_autoload_register('loadClasses');

function loadClasses($className)
{
    echo $className, "\n";
    $className = str_replace('\\', '/', $className);
    spl_autoload($className);
}

$car = new AutoloadExample\Car();
$human = new AutoloadExample\Human();
// $animal = new AutoloadExample\Animal();
var_dump($car, $human);