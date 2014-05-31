<?php

namespace Spl\Scalars;

class BooleanHandler extends ScalarObjectHandler
{

    public function isBool()
    {
        return true;
    }

    public function toJSON()
    {
        return json_encode($this);
    }
}
