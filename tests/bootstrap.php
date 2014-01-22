<?php
require __DIR__."/../vendor/autoload.php";

// Hack to autoload the classes
$init = new Spl\Scalars\StringHandler;
$init = new Spl\Scalars\IntegerHandler;
$init = new Spl\Scalars\FloatHandler;
$init = new Spl\Scalars\ArrayHandler;
$init = new Spl\Scalars\NullHandler;

register_primitive_type_handler('string', 'Spl\\Scalars\\StringHandler');
register_primitive_type_handler('int',    'Spl\\Scalars\\IntegerHandler');
register_primitive_type_handler('float',  'Spl\\Scalars\\FloatHandler');
register_primitive_type_handler('array',  'Spl\\Scalars\\ArrayHandler');
register_primitive_type_handler('null',   'Spl\\Scalars\\NullHandler');