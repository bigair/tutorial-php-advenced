<?php

class ExceptionTest extends PHPUnit_Framework_TestCase
{

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testFailingInclude()
    {
        include 'not_existing_file.php';
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testException()
    {
        throw new InvalidArgumentException('Test');
        // 實作上應用 try ... catch 來完成
    }

}