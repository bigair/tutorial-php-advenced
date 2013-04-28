<?php

class SomeClass // 給 Mock Object 用的類別宣告，不一定要有實際內容
{
    public function doSomething()
    {
    }
}

class StubTest extends PHPUnit_Framework_TestCase
{
    /**
     * @group fakeobject
     */
    public function testStub()
    {
        $stub = $this->getMock('SomeClass'); // 建立 Mock Object
        $stub->expects($this->any()) // 不論呼叫幾次
            ->method('doSomething') // 指定方法
            ->will($this->returnValue('foo')); // 指定回傳值
        $this->assertEquals('foo', $stub->doSomething());
    }
}