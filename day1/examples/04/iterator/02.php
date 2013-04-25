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

class BasicIterator implements Iterator
{
    private $_key = 0;
    private $_list = [];

    public function __construct($list)
    {
        $this->_list = $list;
    }

    // 改用 rewind 而不是 reset
    public function rewind()
    {
        $this->_key = 0;
    }

    public function current()
    {
        return $this->_list[$this->_key];
    }

    public function key()
    {
        return $this->_key;
    }

    public function next()
    {
        $this->_key++;
        return true;
    }

    public function valid()
    {
        return isset($this->_list[$this->_key]);
    }
}

$iterator = new BasicIterator($students);

$iterator->rewind();
do {
    $key = $iterator->key();
    $student = $iterator->current();
    echo "$key : $student\n";
} while ($iterator->next() && $iterator->valid());

foreach ($iterator as $key => $student) {
    echo "$key : $student\n";
}