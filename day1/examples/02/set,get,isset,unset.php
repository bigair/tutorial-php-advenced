<?php
class A
{
    protected $_data = [
        'id' => 1,
        'name' => 'jaceju',
        'gender' => 'male',
    ];

    public function __set($name, $value)
    {
        if (isset($this->_data[$name])) {
            $this->$_data[$name] = $value;
        }
    }

    public function __get($name)
    {
        return isset($this->_data[$name])
             ? $this->_data[$name]
             : null;
    }

    public function __isset($name)
    {
        return isset($this->_data[$name]);
    }

    public function __unset($name)
    {
        unset($this->_data[$name]);
    }
}

$a = new A();
echo $a->id, ' - ', $a->name, ' : ', $a->gender, "\n";

var_dump(isset($a->name));
var_dump(isset($a->xyz));
