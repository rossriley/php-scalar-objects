<?php
namespace Spl\Scalars\Tests;


class StringHandlerTest extends \PHPUnit_Framework_TestCase {


  public function setup() {

  }

  public function testCapitalize()
  {
    $str = "hello world";
    $this->assertEquals($str->capitalize(), "Hello World");
  }

  public function testCaseCompare()
  {
    $str = "hello world";
    $this->assertEquals($str->caseCompare("Hello World"), 0);
  }

  public function testHash() {
    $str = "testing";
    $this->assertEquals($str->hash()->length(), 60 );
  }

  public function testLength() {
    $str = "testing";
    $this->assertEquals($str->length(),7);
  }

  public function testLower()
  {
    $str = "Hello World";
    $this->assertEquals($str->lower(), "hello world");
  }

  public function testRepeat() {
    $str = "testing";
    $this->assertEquals($str->repeat(3), "testingtestingtesting");
  }

  public function testReverse() {
    $str = "testing";
    $this->assertEquals($str->reverse(), "gnitset");
  }

  public function testTrims() {
    $str = "   testing   ";
    $this->assertEquals($str->trim(), "testing");
    $this->assertEquals($str->trimRight(), "   testing");
    $this->assertEquals($str->trimLeft(), "testing   ");

    $str = "testing";
    $this->assertEquals($str->trim("ing"), "test");
  }

  public function testUpper()
  {
    $str = "Hello World";
    $this->assertEquals($str->upper(), "HELLO WORLD");
  }

}