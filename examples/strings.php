<?php
include 'bootstrap.php';


$str = "Hello World";
showCommand("length", '$str = "Hello World"', '$str->length()', $str->length());
showCommand("slice", '$str = "Hello World"', '$str->slice(0,3)', $str->slice(0,3));
showCommand("split", '$str = "Hello World"', '$str->split(" ")', $str->split(" "));
showCommand("toArray", '$str = "Hello World"', '$str->toArray()', $str->toArray());
showCommand("toJSON", '$str = "Hello World"', '$str->toJSON()', $str->toJSON());