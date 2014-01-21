<?php
namespace Spl\Scalars;

class Float extends Number {

    public function toInt() {
        return int($this);
    }
}
