<?php
namespace Spl\Scalars;

class FloatHandler extends NumberHandler
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
