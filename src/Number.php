<?php
namespace Spl\Scalars;

class Number {

    public function abs() {
      return abs($this);
    }

    public function add($int) {
        return $this + $int;
    }

    public function ceil() {
      return ceil($this);
    }

    public function divide($number) {
      return $this / $number;
    }

    public function equals($number) {
      return $this === $number;
    }


    public function floor() {
      return floor($this);
    }

    public function isBoolean() {
      return is_bool($this);
    }

    public function isFloat() {
      return is_float($this);
    }

    public function isInt() {
      return is_int($this);
    }

    public function modulo($num) {
        return floor($this - $num *($this / $num));
    }

    public function toArray() {
      return [$this];
    }

    public function toFloat() {
      return float($this);
    }

    public function toInt() {
      return intval($this);
    }

    public function toJSON() {
      return json_encode($this);
    }


    public function toString() {
      return string($this);
    }

}
