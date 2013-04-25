<?php class Add
{
    protected $_num1 = 0, $_num2 = 0;
    public function setNum1($num)
{
        $this->_num1 = (int) $num;
    }
    public function setNum2($num)
{
$this->_num2 = (int) $num;
}
    public function getResult()
{
return $this->_num1 + $this->_num2;
} }