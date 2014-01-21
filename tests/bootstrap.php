<?php
require __DIR__."/../vendor/autoload.php";


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