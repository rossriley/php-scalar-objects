<?php
namespace Spl\Scalars\Tests;


class FloatHandlerTest extends \PHPUnit_Framework_TestCase {


  public function setup() {

  }

  public function test_round() {
    $float = 1.45678;
    $this->assertEquals($float->round(),1);
    $this->assertEquals($float->round(1),1.5);
    $this->assertEquals($float->round(2),1.46);

  }

}