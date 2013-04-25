<?php
$users = [
    'Peter',
    'Jack',
    'admin' => [
        'Bob',
        'John',
    ],
    'developer' => [
        'Kevin',
        'Steve',
    ],
    'guest' => [
        'Linda',
        'Mary',
        'Susy',
    ],
    'Laura',
];

$iterator = new RecursiveArrayIterator($users);
$rrIterator = new RecursiveIteratorIterator($iterator);

foreach ($rrIterator as $key => $user) {
    echo $rrIterator->getDepth();
    echo " : $key : $user\n";
}