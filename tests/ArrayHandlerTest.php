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

  public function test_each() {
    $arr = [1,2,3,4,5,6,7,8,9,10];
    $arr->each(function(&$value){ $value *=2;});
    $this->assertEquals($arr, [2,4,6,8,10,12,14,16,18,20]);
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

  public function test_join() {
    $arr = ["these","are","some","words"];
    $this->assertEquals($arr->join(" "), "these are some words");
    $this->assertEquals($arr->join(), "thesearesomewords");
  }

  public function test_max() {
    $arr = [2,4,6,8,10];
    $this->assertEquals($arr->max(), 10);

    $arr = [2,4, 11, 6,8,10];
    $this->assertEquals($arr->max(), 11);
  }

  public function test_merge_chain() {
    $arr1 = ["k1"=>"val1","k2"=>"val2"];
    $arr2 = ["k3"=>"val3","k4"=>"val4"];
    $this->assertEquals($arr1->merge($arr2)->count(), 4);
  }

  public function test_min() {
    $arr = [2, 4, 6, 8, 10];
    $this->assertEquals($arr->min(), 2);

    $arr = [2, 4, 6, -2, 8, 10];
    $this->assertEquals($arr->min(), -2);
  }

  public function test_reindex() {
    $arr = [
      ["id"=>5, "val"=>"first"],
      ["id"=>6, "val"=>"second"],
      ["id"=>7, "val"=>"third"]
    ];

    $expected = [
      0=>["id"=>5, "val"=>"first"],
      1=>["id"=>6, "val"=>"second"],
      2=>["id"=>7, "val"=>"third"]
    ];

    $this->assertEquals($arr->reindex(), $expected );

    $expected = [
      5=>["id"=>5, "val"=>"first"],
      6=>["id"=>6, "val"=>"second"],
      7=>["id"=>7, "val"=>"third"]
    ];

    $this->assertEquals($arr->reindex(function($row){return $row["id"];}), $expected);

  }

  public function test_reindex_object() {
    $arr = [
      (object)["id"=>5, "val"=>"first"],
      (object)["id"=>6, "val"=>"second"],
      (object)["id"=>7, "val"=>"third"]
    ];

    $expected = [
      5=>(object)["id"=>5, "val"=>"first"],
      6=>(object)["id"=>6, "val"=>"second"],
      7=>(object)["id"=>7, "val"=>"third"]
    ];

    $this->assertEquals($arr->reindex(function($row){return $row->id;}), $expected);

  }

  public function test_sum() {
    $arr = [2,4,6,8,10];
    $this->assertEquals($arr->sum(), 30);

    $arr = [-2,4,6,8,10];
    $this->assertEquals($arr->sum(), 26);
  }

  public function test_any() {
    $arr = [true, false];
    $this->assertEquals($arr->any(), true);

    $arr = [false, false];
    $this->assertEquals($arr->any(), false);

    $arr = [false, true, false];
    $this->assertEquals($arr->any(), true);

    $arr = [1, 0, false];
    $this->assertEquals($arr->any(), true);

    $arr = [false, 0, '', []];
    $this->assertEquals($arr->any(), false);

    $arr = [false, 0, '', [1]];
    $this->assertEquals($arr->any(), true);
  }

  public function test_all() {
    $arr = [2,4,6,8,10];
    $this->assertEquals($arr->all(), true);

    $arr = [true];
    $this->assertEquals($arr->all(), true);

    $arr = [1];
    $this->assertEquals($arr->all(), true);

    $arr = ['asdf'];
    $this->assertEquals($arr->all(), true);

    $arr = [[1]];
    $this->assertEquals($arr->all(), true);

    $arr = [true, 1, 'asdf', [1]];
    $this->assertEquals($arr->all(), true);

    $arr = [false, 1, 'asdf', [1]];
    $this->assertEquals($arr->all(), false);

    $arr = [true, 0, 'asdf', [1]];
    $this->assertEquals($arr->all(), false);

    $arr = [true, 1, '', [1]];
    $this->assertEquals($arr->all(), false);

    $arr = [true, 1, 'asdf', []];
    $this->assertEquals($arr->all(), false);

    $arr = [false, 0, '', []];
    $this->assertEquals($arr->all(), false);
  }

  public function test_intersect() {
    $arr1 = ['a' => 'green', 'red', 'blue'];
    $arr2 = ['b' => 'green', 'yellow', 'red'];
    $this->assertEquals($arr1->intersect($arr2), ['a' => 'green', 0 => 'red']);
  }

  public function test_reduce() {

    $rsum = function($accumulator, $w) {
        $accumulator += $w;
        return $accumulator;
    };

    $rmul = function($accumulator, $w) {
        $accumulator *= $w;
        return $accumulator;
    };

    $mappish_cube = function ($accumulator, $w) {
        $accumulator[] = $w * $w;
        return $accumulator;
    };

    $arr_num = [1,2,3,4,5];
    $arr_emp = [];

    $this->assertEquals($arr_num->reduce($rsum), 15);
    $this->assertEquals($arr_num->reduce($rmul, 10), 1200);
    $this->assertEquals($arr_num->reduce($mappish_cube, []), [1, 4, 9, 16, 25]);
    $this->assertEquals($arr_emp->reduce($rsum, 'No data to reduce'), 'No data to reduce');
  }

  public function test_map() {
    // Test #1
    $cube = function($n) {
        return($n * $n * $n);
    };

    $arr = [1,2,3,4,5];
    $this->assertEquals($arr->map($cube), [1,8,27,64,125]);

    // Test #2
    $func = function($value) {
        return $value * 2;
    };

    $arr = [1,2,3,4,5];
    $this->assertEquals($arr->map($func), [2,4,6,8,10]);

    // Test #3
    $sSpan = function($n, $m) {
        return "The number $n is called $m in Spanish";
    };

    $mSpan = function($n, $m) {
        return [$n => $m];
    };

    $arr_num = [1,2,3,4,5];
    $arr_txt = ['uno','dos','tres','cuatro','cinco'];


    $this->assertEquals (
      $arr_num->map($sSpan, $arr_txt),
      [
        'The number 1 is called uno in Spanish',
        'The number 2 is called dos in Spanish',
        'The number 3 is called tres in Spanish',
        'The number 4 is called cuatro in Spanish',
        'The number 5 is called cinco in Spanish',
      ]
    );


    $this->assertEquals (
      $arr_num->map($mSpan, $arr_txt),
      [[1=>'uno'],[2=>'dos'],[3=>'tres'],[4=>'cuatro'],[5=>'cinco']]
    );

    // Test #4
    $arr_num = [1,2,3,4,5];
    $arr_eng = ['one','two','three','four','five'];
    $arr_esp = ['uno','dos','tres','cuatro','cinco'];

    $this->assertEquals(
      $arr_num->map(null, $arr_eng, $arr_esp),
      [
        [1,'one','uno'],
        [2,'two','dos'],
        [3,'three','tres'],
        [4,'four','cuatro'],
        [5,'five','cinco']
      ]
    );

    // Test #5
    $cb1 = function($a) {
        return [$a];
    };

    $cb2 = function($a,$b) {
        return [$a,$b];
    };

    $arr = ['stringkey'=>'value'];
    $this->assertEquals($arr->map($cb1), ["stringkey"=>['value']]);
    $this->assertEquals($arr->map($cb2,$arr), [['value','value']]);
    $this->assertEquals($arr->map(null), ['stringkey'=>'value']);
    $this->assertEquals($arr->map(null,$arr), [['value','value']]);
  }

  public function test_filter() {
    $odd = function($var){
        return($var & 1);
    };

    $even = function($var){
        return(!($var & 1));
    };

    $arr1 = ['a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5];
    $arr2 = [6,7,8,9,10,11,12];

    $this->assertEquals($arr1->filter($odd),  ['a'=>1,'c'=>3,'e'=>5] );
    $this->assertEquals($arr2->filter($even), [0=>6, 2=>8, 4=>10, 6=>12]);
  }

  public function test_intersperse() {
    $this->assertEquals($this->simpleArray->intersperse('foo'), ["first", "foo", "second", "foo", "third", "foo", "fourth", "foo", "fifth"]);
  }

  public function test_difference() {
    $arr1 = ['a'=>'green','red','blue','red'];
    $arr2 = ['b'=>'green','yellow','red'];
    $this->assertEquals($arr1->difference($arr2), [1=>'blue']);
  }

  public function test_slice() {
    $arr = ['a','b','c','d','e'];

    $this->assertEquals($arr->slice(2), ['c','d','e']);
    $this->assertEquals($arr->slice(-2, 1), ['d']);
    $this->assertEquals($arr->slice(0, 3), ['a','b','c']);

    $this->assertEquals($arr->slice(2, -1), [0=>'c',1=>'d']);
    $this->assertEquals($arr->slice(2, -1, true), [2=>'c',3=>'d']);
  }

  public function test_splice() {
    $arr = ['red','green','blue','yellow'];
    $this->assertEquals($arr->splice(2),['red','green']);
    $this->assertEquals($arr->splice(1, -1),['red','yellow']);
    $this->assertEquals($arr->splice(1, count($arr), 'orange'),['red','orange']);
    $this->assertEquals($arr->splice(-1, 1, ['black','maroon']),['red','green','blue','black','maroon']);
    $this->assertEquals($arr->splice(3, 0, 'purple'),['red','green','blue', 'purple', 'yellow']);
  }


}
