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

    //Stub
    public function toPrecision ($int = null) {
        if (!$int === null) {
            return $this->toString();
        }
        return $this->toString();
    }

    public function toFixed ($int = null) {
        if ($int === null) {
            return $this->toString();
        }
        return round($this, $int)->toString();
    }

}
