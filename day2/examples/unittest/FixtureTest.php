<?php
require_once 'PHPUnit/Framework.php';
class ArrayTest extends PHPUnit_Framework_TestCase
{
    protected $fixture;

    protected function setUp()
    {
        $this->fixture = array();
    }

    public function testNewArrayIsEmpty()
    {
    $this->assertEquals(0, sizeof($this->fixture));
    }

    public function testArrayContainsAnElement()
    {
    $this->fixture[] = 'Element';
    $this->assertEquals(1, sizeof($this->fixture));
    }

    protected function tearDown()
    {
    unset($this->fixture); }
    }
}