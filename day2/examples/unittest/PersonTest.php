<?php


require_once 'PHPUnit/Framework/TestCase.php'; require_once 'Person.php';
class PersonTest extends PHPUnit_Framework_TestCase
{
public function testSayHelloTo()
    {
        $person = new Person('Jace');
        $this->assertEquals(
            'Hello, Neo. I am Jace.',
            $person->sayHelloTo('Neo')
); }
}