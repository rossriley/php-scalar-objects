<?php
namespace Spl\Scalars\Tests;

class IntegerHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {

    }

    public function testToInt()
    {
        $int = 2;
        $this->assertEquals($int->toInt(), $int);
    }

    public function testEven() {
        $int = 2;
        $this->assertTrue($int->even());
        $this->assertFalse($int->odd());
    }

    public function testOdd() {
        $int = 7;
        $this->assertTrue($int->odd());
        $this->assertFalse($int->even());
    }

    public function testSqrt()
    {
        $int = 64;
        $this->assertEquals($int->sqrt(), 8);
    }

}