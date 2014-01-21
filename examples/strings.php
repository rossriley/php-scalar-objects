<?php
include 'bootstrap.php';


$str = "Hello World";
showCommand("LENGTH", '$str = "Hello World"', '$str->length()', $str->length());
showCommand("SLICE", '$str = "Hello World"', '$str->slice(0,3)', $str->slice(0,3));
showCommand("SPLIT", '$str = "Hello World"', '$str->split(" ")', print_r($str->split(" "),1));
