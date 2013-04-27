<?php

class ArrayTest extends PHPUnit_Framework_TestCase
{
    protected $fixture;

    public function testNewArrayIsEmpty()
    {
        $this->assertEquals(0, sizeof($this->fixture));
    }

    public function testArrayContainsAnElement()
    {
        $this->fixture[] = 'Element';
        $this->assertEquals(1, sizeof($this->fixture));
    }

    protected function setUp()
    {
        $this->fixture = array();
    }

    protected function tearDown()
    {
        unset($this->fixture);
    }
}