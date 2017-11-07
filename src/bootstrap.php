<?php

use Spl\Scalars\StringHandler;
use Spl\Scalars\IntegerHandler;
use Spl\Scalars\FloatHandler;
use Spl\Scalars\ArrayHandler;
use Spl\Scalars\NullHandler;

register_primitive_type_handler('string', Spl\Scalars\StringHandler::class);
register_primitive_type_handler('int',    Spl\Scalars\IntegerHandler::class);
register_primitive_type_handler('float',  Spl\Scalars\FloatHandler::class);
register_primitive_type_handler('array',  Spl\Scalars\ArrayHandler::class);
register_primitive_type_handler('null',   Spl\Scalars\NullHandler::class);
register_primitive_type_handler('bool',   Spl\Scalars\BooleanHandler::class);
