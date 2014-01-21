<?php
include __DIR__."/../vendor/autoload.php";
// Hack to autoload the classes
$init = new Spl\Scalars\String;
$init = new Spl\Scalars\Integer;
$init = new Spl\Scalars\Float;
$init = new Spl\Scalars\Arrays;
$init = new Spl\Scalars\Nulls;

register_primitive_type_handler('string', 'Spl\\Scalars\\String');
register_primitive_type_handler('int',    'Spl\\Scalars\\Integer');
register_primitive_type_handler('float',  'Spl\\Scalars\\Float');
register_primitive_type_handler('array',  'Spl\\Scalars\\Arrays');
register_primitive_type_handler('null',   'Spl\\Scalars\\Nulls');


function showCommand($title, $input, $command, $output) {
  echo PHP_EOL;
  echo "============ $title =============".PHP_EOL;
  echo $input.PHP_EOL;
  echo $command.PHP_EOL;
  echo PHP_EOL;
  echo "----- Outputs -----".PHP_EOL.$output.PHP_EOL;
  echo PHP_EOL;
}