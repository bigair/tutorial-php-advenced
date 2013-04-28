<?php

class PersonTest extends PHPUnit_Framework_TestCase
{
    public function testSayHelloTo()
    {
        $person = new Person('Jace');
        $this->assertEquals(
            'Hello, Neo. I am Jace.',
            $person->sayHelloTo('Neo')
        );
    }
}