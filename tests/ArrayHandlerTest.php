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

  public function test_join() {
    $arr = ["these","are","some","words"];
    $this->assertEquals($arr->join(" "), "these are some words");
    $this->assertEquals($arr->join(), "thesearesomewords");
  }

  public function test_max() {
    $arr = [2,4,6,8,10];
    $this->assertEquals($arr->max(), 10);
  }

  public function test_min() {
    $arr = [2,4,6,8,10];
    $this->assertEquals($arr->min(), 2);
  }

  public function test_sum() {
    $arr = [2,4,6,8,10];
    $this->assertEquals($arr->sum(), 30);
  }

  // public function test_any() {
  //   $arr = [2,4,6,8,10];
  //   $this->assertEquals($arr->any(), );
  // }

  // public function test_all() {
  //   $arr = [2,4,6,8,10];
  //   $this->assertEquals($arr->all(), );
  // }

  public function test_intersect() {
    $arr1 = ['a' => 'green', 'red', 'blue'];
    $arr2 = ['b' => 'green', 'yellow', 'red'];
    $this->assertEquals($arr1->intersect($arr2), ['a' => 'green', 0 => 'red']);
  }

  public function test_reduce() {
    function rsum($v, $w) {
        $v += $w;
        return $v;
    }
    function rmul($v, $w) {
        $v *= $w;
        return $v;
    }

    $arr_num = [1,2,3,4,5];
    $arr_emp = [];

    $this->assertEquals($arr_num->reduce('rsum'), [15]);
    $this->assertEquals($arr_num->reduce('rmul', 10), [1200]);
    $this->assertEquals($arr_emp->reduce('rsum', 'No data to reduce'), ['No data to reduce']);
  }

  // public function test_fold() {
  //   $arr = [2,4,6,8,10];
  //   $this->assertEquals($arr->fold(), );
  // }

  public function test_map() {
    // Test #1
    function cube($n) {
        return($n * $n * $n);
    }

    $arr = [1,2,3,4,5];
    $this->assertEquals($arr->map('cube'), [1,8,27,64,125]);

    // Test #2
    $func = function($value) {
        return $value * 2;
    };

    $arr = [1,2,3,4,5];
    $this->assertEquals($arr->map($func), [2,4,6,8,10]);

    // Test #3
    function show_Spanish($n, $m) {
        return "The number $n is called $m in Spanish";
    }
    function map_Spanish($n, $m) {
        return [$n => $m];
    }

    $arr_num = [1,2,3,4,5];
    $arr_txt = ['uno','dos','tres','cuatro','cinco'];

    $this->assertEquals (
      $arr_num->map('show_Spanish', $arr_txt), 
      [
        'The number 1 is called uno in Spanish',
        'The number 2 is called dos in Spanish',
        'The number 3 is called tres in Spanish',
        'The number 4 is called cuatro in Spanish',
        'The number 5 is called cinco in Spanish',
      ]
    );

    $this->assertEquals (
      $arr_num->map('map_Spanish', $arr_txt),
      [['uno'],['dos'],['tres'],['cuatro'],['cinco']]
    );

    // Test #4
    $arr_num = [1,2,3,4,5];
    $arr_eng = ['one','two','three','four','five'];
    $arr_esp = ['uno','dos','tres','cuatro','cinco'];

    $this->assertEquals(
      $arr_num->map(null, $arr_eng, $arr_esp), 
      [
        ['1','one','uno'],
        ['2','two','dos'],
        ['3','three','tres'],
        ['4','four','cuatro'],
        ['5','five','cinco']
      ]
    );

    // Test #5
    function cb1($a) {
        return [$a];
    }
    function cb2($a,$b) {
        return [$a,$b];
    }
    $arr = ['stringkey'=>'value'];
    $this->assertEquals($arr->map('cb1'), [['stringkey']=>['value']]);
    $this->assertEquals($arr->map('cb2',$arr), [['value','value']]);
    $this->assertEquals($arr->map(null), [['stringkey']=>'value']);
    $this->assertEquals($arr->map(null,$arr), [['value','value']]);
  }

  public function test_filter() {
    function odd($var){
      return($var & 1);
    }
    function even($var){
        return(!($var & 1));
    }

    $arr1 = ['a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5];
    $arr2 = [6,7,8,9,10,11,12];

    $this->assertEquals($arr1->filter('odd'), [['a']=>1,['c']=>3,['e']=>5]);
    $this->assertEquals($arr2->filter('even'), [[0]=>6,[2]=>8,[4]=>10,[6]=>12]);
  }

  // public function test_intersperse() {
  //   $arr = [2,4,6,8,10];
  //   $this->assertEquals($arr->intersperse(), );
  // }

  // public function test_union() {
  //   $arr = [2,4,6,8,10];
  //   $this->assertEquals($arr->union(), );
  // }

  public function test_difference() {
    $arr1 = ['a'=>'green','red','blue','red'];
    $arr2 = ['b'=>'green','yellow','red'];
    $this->assertEquals($arr1->difference($arr2), ['blue']);
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