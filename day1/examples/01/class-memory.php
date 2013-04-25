<?php
// Init
$m1 = memory_get_usage();
$m2 = $m1;
echo "Initial: \t\t\t\t", number_format($m1 / 1024), " KB\n";

$m2 = memory_get_usage();
echo "Get memory usage: \t\t", $m2 - $m1, " Bytes\n";
$m1 = $m2;

$m2 = memory_get_usage();
echo "Do nothing: \t\t\t", $m2 - $m1, " Bytes\n";
$m1 = $m2;

include 'Car.php';

$m2 = memory_get_usage();
echo "Class be included: \t\t", $m2 - $m1, " Bytes\n";
$m1 = $m2;

$m2 = memory_get_usage();
echo "Do nothing: \t\t\t", $m2 - $m1, " Bytes\n";
$m1 = $m2;

$car = new Car();

$m2 = memory_get_usage();
echo "Instance be created: \t", $m2 - $m1, " Bytes\n";
$m1 = $m2;

$m2 = memory_get_usage();
echo "Do nothing: \t\t\t", $m2 - $m1, " Bytes\n";
$m1 = $m2;

