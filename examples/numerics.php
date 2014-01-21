<?php
include 'bootstrap.php';


$num = 12;
showCommand("add", '$num"', '$num->add(4)', $num->add(4));

$num = 12.5;
showCommand("add", '$num', '$num->add(4.2)', $num->add(4.2));

$num = -25;
showCommand("add", '$num', '$num->abs()', $num->abs());


$num = 12.5;
showCommand("toInt", '$num = 12.5', '$num->toInt()', $num->toInt());

$num = 12.5;
showCommand("toJSON", '$num = 12.5', '$num->toJSON()', $num->toJSON());