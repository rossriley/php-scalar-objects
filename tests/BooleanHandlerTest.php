<?php

namespace Spl\Scalars\Tests;

class BooleanHandlerTest extends \PHPUnit_Framework_TestCase
{

    public function setup()
    {
        
    }

    public function test_true ()
    {
        $true = true;
        $this->assertTrue($true->isBool());
    }

}
