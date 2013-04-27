<?php
$students = [
    'Jack',
    'Bob',
    'John',
    'Peter',
    'Kevin',
    'Steve',
    'Linda',
    'Mary',
    'Laura',
    'Susy',
];

foreach ($students as $key => $student) {
    echo "$key : $student\n";
}

reset($students);
do {
    echo key($students), ' : ', current($students), "\n";
} while (next($students));