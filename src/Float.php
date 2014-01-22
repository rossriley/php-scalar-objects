<?php
namespace Spl\Scalars;

class Float extends Number
{

    public function toInt()
    {
        return intval($this);
    }

    public function round($precision = 0, $mode = null)
    {
        return round($this, $precision, $mode);
    }

}
