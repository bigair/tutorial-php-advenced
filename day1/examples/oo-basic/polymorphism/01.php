<?php

class Vehicle
{
    public function forward()
    {

    }
}

class Car extends Vehicle
{
    public function forward()
    {
        echo "用四輪前進\n";
    }
}

// 黃包車
class Rickshaw extends Vehicle
{
    public function forward()
    {
        echo "人拉著前進\n";
    }
}

// 機車
class Motocycle extends Vehicle
{
    public function forward()
    {
        echo "兩輪前進\n";
    }
}

$vehicles = [
    new Car(),
    new Rickshaw(),
    new Motocycle(),
];

foreach ($vehicles as $vehicle) {
    $vehicle->forward();
}