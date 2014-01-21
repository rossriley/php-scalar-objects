<?php
namespace Spl\Scalars\Tests;


class StringHandlerTest extends \PHPUnit_Framework_TestCase {


  public function setup() {

  }

  public function test_length() {
    $str = "testing";
    $this->assertEquals($str->length(),7);

  }

}