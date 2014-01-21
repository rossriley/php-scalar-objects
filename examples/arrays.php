<?php
include 'bootstrap.php';


$arr = [1=>"first", 2=>"second", 3=>"third", 4=>"fourth", 5=>"fifth"];
showCommand("chunk", '$arr = [1=>"first", 2=>"second", 3=>"third", 4=>"fourth", 5=>"fifth"]', '$arr->chunk(2)', $arr->chunk(2));

$arr = [["key1"=>"value","key2"=>"value2"],["key1"=>"value","key2"=>"value2"]];
showCommand("column",'$arr = [["key1"=>"value","key2"=>"value2"],["key1"=>"value","key2"=>"value2"]]', '$arr->column("key2")', $arr->column("key2"));


$array  = ["k1"=>"val","k2"=>"val2"];
$array2 = ["k2"=>"val2","k3"=>"val3"];
showCommand("diff",'$array, $array2', '$array->diff($array2)', $array->diff($array2));


$array  = ["k1"=>"val","k2"=>"val2"];
showCommand("hasKey",'$array', '$array->hasKey("k2")', $array->hasKey("k2"));
