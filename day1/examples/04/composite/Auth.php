<?php
abstract class Auth
{
    protected $_name = '';

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function add(Auth $auth)
    {
    }

    public function display($depth = 0)
    {
    }
}