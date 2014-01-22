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

  public function test_merge_chain() {
    $arr1 = ["k1"=>"val1","k2"=>"val2"];
    $arr2 = ["k3"=>"val3","k4"=>"val4"];
    $this->assertEquals($arr1->merge($arr2)->count(), 4);
  }

  public function test_has() {
    $arr = $this->simpleArray;
    $this->assertEquals($arr->has("second"), true);
    $this->assertEquals($arr->has("tenth"), false);

  }

  public function test_indexOf() {
    $arr = $this->simpleArray;
    $this->assertEquals($arr->indexOf("second"), 1);
    $this->assertEquals($arr->indexOf("tenth"), false);
    $keyarray = ['a' => 1, 'b' => 2, 'c' => 3];
    $this->assertEquals($keyarray->indexOf(2), "b");
  }

  public function test_max() {
    $arr = [2,4,6,8,10];
    $this->assertEquals($arr->max(), 10);
  }


}