<?php
namespace Spl\Scalars;

class Arrays {

  public function chunk($size) {
    $this->verifyInteger($size, "chunk()");
    return array_chunk($this, $size);
  }

  public function column($key) {
    $this->verifyString($key, "column()");
    return array_column($this, $key);
  }

  public function combine($arrayVals) {
    $this->verifyArray($arrayVals, "combine()");
    return array_combine($this,$arrayVals);
  }

  public function count() {
    return count($this);
  }

  public function countValues() {
    return array_count_values($this);
  }

  public function diff($array) {
    $this->verifyArray($array, "diff()");
    return array_diff($this, $array);
  }

  public function hasKey($key) {
    $this->verifyString($key, "hasKey()");
    return array_key_exists($key, $this);
  }

  public function keys() {
    return array_keys($this);
  }

  public function keySort() {
    ksort($this);
    return $this;
  }

  public function merge($array) {
    $this->verifyArray($array, "merge()");
    return array_merge($this, $array);
  }

  public function push($val) {
    array_push($this, $val);
    return $this;
  }

  public function rand($number = 1) {
    $r = array_rand($this, $number);
    return $this[$r];
  }

  public function reverseKeySort() {
    krsort($this);
    return $this;
  }

  public function sort() {
    sort($this);
    return $this;
  }

  public function toArray() {
    return $this;
  }

  public function toFloat() {
    return float($this);
  }

  public function toInt() {
    return int($this);
  }

  public function toJSON() {
    return json_encode($this);
  }


  public function toString() {
    return string($this);
  }

  public function values() {
    return array_values($this);
  }




  protected function verifyInteger($input = null, $methodName = "") {
    if (false === is_int($input)) {
      throw new \InvalidArgumentException("Argument passed to $methodName has to be an integer");
    }
  }

  protected function verifyString($input = null, $methodName = "") {
    if (false === is_string($input)) {
      throw new \InvalidArgumentException("Argument passed to $methodName has to be a string");
    }
  }

  protected function verifyArray($input = null, $methodName = "") {
    if (false === is_array($input)) {
      throw new \InvalidArgumentException("Argument passed to $methodName has to be a array");
    }
  }

}
