<?php
namespace Spl\Scalars\Tests;

class BaseHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {

    }

    public function testArray()
    {
        $array = [1,2,3,4,5];
        $this->assertEquals($array->isArray(),      true);
        $this->assertEquals($array->isBool(),       false);
        $this->assertEquals($array->isFloat(),      false);
        $this->assertEquals($array->isInt(),        false);
        $this->assertEquals($array->isNull(),       false);
        $this->assertEquals($array->isResource(),   false);
        $this->assertEquals($array->isString(),     false);
    }

    public function testBooleans()
    {
        $bool = true;
        $this->assertEquals($bool->isArray(),      false);
        $this->assertEquals($bool->isBool(),       true);
        $this->assertEquals($bool->isFloat(),      false);
        $this->assertEquals($bool->isInt(),        false);
        $this->assertEquals($bool->isNull(),       false);
        $this->assertEquals($bool->isResource(),   false);
        $this->assertEquals($bool->isString(),     false);
    }

    public function testFloat()
    {
        $float = 123.45678;
        $this->assertEquals($float->isArray(),      false);
        $this->assertEquals($float->isBool(),       false);
        $this->assertEquals($float->isFloat(),      true);
        $this->assertEquals($float->isInt(),        false);
        $this->assertEquals($float->isNull(),       false);
        $this->assertEquals($float->isResource(),   false);
        $this->assertEquals($float->isString(),     false);
    }

    public function testInt()
    {
        $int = 100;
        $this->assertEquals($int->isArray(),      false);
        $this->assertEquals($int->isBool(),       false);
        $this->assertEquals($int->isFloat(),      false);
        $this->assertEquals($int->isInt(),        true);
        $this->assertEquals($int->isNull(),       false);
        $this->assertEquals($int->isResource(),   false);
        $this->assertEquals($int->isString(),     false);
    }

    public function testNull()
    {
        $null = null;
        $this->assertEquals($null->isArray(),      false);
        $this->assertEquals($null->isBool(),       false);
        $this->assertEquals($null->isFloat(),      false);
        $this->assertEquals($null->isInt(),        false);
        $this->assertEquals($null->isNull(),       true);
        $this->assertEquals($null->isResource(),   false);
        $this->assertEquals($null->isString(),     false);
    }

    public function testString()
    {
        $str = "Hello World";
        $this->assertEquals($str->isArray(),      false);
        $this->assertEquals($str->isBool(),       false);
        $this->assertEquals($str->isFloat(),      false);
        $this->assertEquals($str->isInt(),        false);
        $this->assertEquals($str->isNull(),       false);
        $this->assertEquals($str->isResource(),   false);
        $this->assertEquals($str->isString(),     true);
    }

}