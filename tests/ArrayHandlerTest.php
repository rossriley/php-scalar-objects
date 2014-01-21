<?php
namespace Spl\Scalars\Tests;


class ArrayHandlerTest extends \PHPUnit_Framework_TestCase {

  public $simpleArray = ["first","second","third","fourth","fifth"];

  public function setup() {

  }

  public function test_chunk() {
    $arr = $this->simpleArray;
    $this->assertEquals($arr->chunk(2), [["first","second"],["third","fourth"],["fifth"]]);

  }

  public function test_column() {
    $arr = [["key1"=>"value","key2"=>"value2"],["key1"=>"value","key2"=>"value2"]];
    $this->assertEquals($arr->column("key2"), ["value2","value2"]);
  }

  public function test_combine() {
    $keys =  ["k1","k2","k3","k4"];
    $vals =  ["val1","val2","val3","val4"];
    $this->assertEquals($keys->combine($vals), ["k1"=>"val1","k2"=>"val2","k3"=>"val3","k4"=>"val4"]);

  }

}