<?php
// Init
echo "Initial: \t\t\t\t", memory_get_usage(), " KB\n";
echo "Get memory usage: \t\t", memory_get_usage(), " Bytes\n";
echo "Do nothing: \t\t\t", memory_get_usage(), " Bytes\n";
include 'Car.php';
echo "Class be included: \t\t", memory_get_usage(), " Bytes\n";
echo "Do nothing: \t\t\t", memory_get_usage(), " Bytes\n";