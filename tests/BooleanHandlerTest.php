<?php

namespace Spl\Scalars\Tests;

class BooleanHandlerTest extends \PHPUnit_Framework_TestCase
{

    public function setup()
    {

    }

    public function testTrue ()
    {
        $true = true;
        $this->assertTrue($true->isBool());
    }

}
