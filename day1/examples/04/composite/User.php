<?php
class User extends Auth
{
    public function display($depth = 0)
    {
        echo str_repeat(' ', $depth);
        echo $this->_name, "\n";
    }
}