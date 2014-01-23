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

  public function test_toFixed() {
    $f = 5.123456;
    $this->assertEquals($f->toFixed(), "5.123456");
    $this->assertEquals($f->toFixed(1), "5.1");
    $this->assertEquals($f->toFixed(2), "5.12");
    $this->assertEquals($f->toFixed(3), "5.123");
    $this->assertEquals($f->toFixed(4), "5.1235");
    $this->assertEquals($f->toFixed(5), "5.12346");
    $this->assertEquals($f->toFixed(6), "5.123456");
    $this->assertEquals($f->toFixed(10), "5.1234560000");
  }

  public function test_toPrecision() {
    $this->markTestSkipped('must be revisited');
    $f = 5.123456;
    $this->assertEquals($f->toPrecision(), "5.123456");
    $this->assertEquals($f->toPrecision(5), "5.1235");
    $this->assertEquals($f->toPrecision(2), "5.1");
    $this->assertEquals($f->toPrecision(1), "5");

    $f = 10.123;
    $this->assertEquals($f->toPrecision(), "10.123");
    $this->assertEquals($f->toPrecision(2), "10");
    $this->assertEquals($f->toPrecision(3), "10.1");
    $this->assertEquals($f->toPrecision(1), "1e1");

    $f = 10234.4;
    $this->assertEquals($f->toPrecision(), "10234.4");
    $this->assertEquals($f->toPrecision(6), "10234.4");
    $this->assertEquals($f->toPrecision(5), "10234");
    $this->assertEquals($f->toPrecision(4), "1023e1");
    $this->assertEquals($f->toPrecision(3), "102e2");
    $this->assertEquals($f->toPrecision(2), "10e3");
    $this->assertEquals($f->toPrecision(1), "1e4");
  }
}
