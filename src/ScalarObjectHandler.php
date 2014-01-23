<?php
namespace Spl\Scalars;

class ScalarObjectHandler
{

    public function isArray()
    {
        return false;
    }

    public function isBool()
    {
        return false;
    }

    public function isFloat()
    {
        return false;
    }

    public function isInt() {
        return false;
    }

    public function isNull()
    {
        return false;
    }

    public function isResource()
    {
        return false;
    }

    public function isString()
    {
        return false;
    }

    public function toJSON()
    {
        return json_encode($this);
    }

}
