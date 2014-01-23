<?php
namespace Spl\Scalars;

class NullHandler extends ScalarObjectHandler
{

    public function isNull() {
        return true;
    }

    public function toArray()
    {
        return [];
    }

    public function toJSON()
    {
        return json_encode([]);
    }

}
