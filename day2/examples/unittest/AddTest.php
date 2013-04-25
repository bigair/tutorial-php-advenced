<?php
require_once 'PHPUnit/Framework/TestCase.php'; require_once 'Add.php';
class AddTest extends PHPUnit_Framework_TestCase
{
/**
* @dataProvider provider
*/
public function testAdd($num1, $num2, $expection)
{
$add = new Add();
$add->setNum1($num1);
$add->setNum2($num2); $this->assertEquals($expection, $add->getResult());
}
public function provider()
{
return array(
}
); // 可以用迴圈或讀檔的方式去產生大量的測試資料 }