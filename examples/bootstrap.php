<?php

use Spl\Scalars\StringHandler;
use Spl\Scalars\IntegerHandler;
use Spl\Scalars\FloatHandler;
use Spl\Scalars\ArrayHandler;
use Spl\Scalars\NullHandler;

include __DIR__."/../vendor/autoload.php";

register_primitive_type_handler('string', Spl\Scalars\StringHandler::class);
register_primitive_type_handler('int',    Spl\Scalars\IntegerHandler::class);
register_primitive_type_handler('float',  Spl\Scalars\FloatHandler::class);
register_primitive_type_handler('array',  Spl\Scalars\ArrayHandler::class);
register_primitive_type_handler('null',   Spl\Scalars\NullHandler::class);
register_primitive_type_handler('bool',   Spl\Scalars\BooleanHandler::class);

function showCommand($title, $input, $command, $output) {
  echo PHP_EOL;
  echo "============ $title =============".PHP_EOL;
  echo $input.PHP_EOL;
  echo $command.PHP_EOL;
  echo PHP_EOL;
  if(is_array($output)) $output = print_r($output, 1);
  else $output = var_export($output, 1);
  echo "----- Outputs -----".PHP_EOL.$output.PHP_EOL;
  echo PHP_EOL;
}
