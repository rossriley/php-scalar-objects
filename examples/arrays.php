<?php
include 'bootstrap.php';


$arr = [1=>"first", 2=>"second", 3=>"third", 4=>"fourth", 5=>"fifth"];
showCommand("CHUNK", '$arr = [1=>"first", 2=>"second", 3=>"third", 4=>"fourth", 5=>"fifth"]', '$arr->chunk(2)', $arr->chunk(2));

$arr = [["key1"=>"value","key2"=>"value2"],["key1"=>"value","key2"=>"value2"]];
showCommand("COLUMN",'$arr = [["key1"=>"value","key2"=>"value2"],["key1"=>"value","key2"=>"value2"]]', '$arr->column("key2")', $arr->column("key2"));
