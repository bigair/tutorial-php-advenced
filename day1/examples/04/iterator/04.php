<?php

class NameFilterIterator extends FilterIterator
{
    public function accept()
    {
        $iterator = $this->getInnerIterator();
        $value = $iterator->current();
        return (strpos($value, 'J') === 0);
    }
}

$iterator = new ArrayIterator([
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
]);

$filterIterator = new NameFilterIterator($iterator);

foreach ($filterIterator as $key => $value) {
    echo "$key : $value\n";
}