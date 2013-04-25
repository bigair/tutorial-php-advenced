<?php
class Person
{
    protected $_name = '';
    public function __construct($name)
{
        $this->_name = (string) $name;
    }
    public function sayHelloTo($name)
{
return 'Hello, ' . $name . '. I am ' . $this->_name . '.';
} }
