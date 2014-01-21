<?php
namespace Spl\Scalars;

class Float extends Number {

    public function toInt() {
        return intval($this);
    }

}
