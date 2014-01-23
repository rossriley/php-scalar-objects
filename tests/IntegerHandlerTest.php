<?php
namespace Spl\Scalars\Tests;

class IntegerHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {

    }

    public function testMethods()
    {
        $int = 2;
        $this->assertEquals($int->toInt(), $int);
        $this->assertTrue($int->even());
        $this->assertFalse($int->odd());
    }

}