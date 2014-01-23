<?php
require __DIR__."/../vendor/autoload.php";

register_primitive_type_handler('string', 'Spl\\Scalars\\StringHandler');
register_primitive_type_handler('int',    'Spl\\Scalars\\IntegerHandler');
register_primitive_type_handler('float',  'Spl\\Scalars\\FloatHandler');
register_primitive_type_handler('array',  'Spl\\Scalars\\ArrayHandler');
register_primitive_type_handler('null',   'Spl\\Scalars\\NullHandler');
register_primitive_type_handler('bool',   'Spl\\Scalars\\BooleanHandler');
