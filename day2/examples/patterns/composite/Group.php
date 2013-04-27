<?php


class Group extends Auth
{
    protected $_authList = array();

    public function add(Auth $auth)
    {
        if ($auth === $this) {
            die('Fail add!');
        }
        $this->_authList[$auth->getName()] = $auth;
    }

    public function display($depth = 0)
    {
        echo str_repeat(' ', $depth);
        echo $this->_name, "\n";
        foreach ($this->_authList as $name => $auth) {
            $auth->display($depth + 2);
        }
    }
}