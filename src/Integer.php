<?php
namespace Spl\Scalars;

class Integer extends Number
{

    public function toInt()
    {
        return $this;
    }

    public function even()
    {
        return $this % 2 === 0;
    }

    public function odd()
    {
        return $this % 2 === 1;
    }
}
