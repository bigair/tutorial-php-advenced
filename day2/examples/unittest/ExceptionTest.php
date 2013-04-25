<?php
require_once 'PHPUnit/Framework.php';
class ExceptionTest extends PHPUnit_Framework_TestCase
{

/**
 * @expectedException InvalidArgumentException
 */
public function testException()
{
    throw new InvalidArgumentException('Test');
    // 實作上應用 try ... catch 來完成
}

}