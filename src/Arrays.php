<?php
namespace Spl\Scalars;

class Arrays {

  public function chunk() {

  }

  public function column() {
    return array_column($this);
  }

  public function combine($array_vals) {
    return array_combine($this,$array_vals);
  }

  public function count() {
    return count($this);
  }

  public function countValues() {
    return array_count_values($this);
  }

  public function diff($array) {
    return array_diff($this, $array);
  }

  public function keys() {
    return array_keys($this);
  }

  public function merge($array) {
    return array_merge($this, $array);
  }

  public function push($val) {
    return array_push($this, $val);
  }

  public function rand() {
    return array_rand($this);
  }

  public function values() {
    return array_values($this);
  }

  public function hasKey($key) {
    return array_key_exists($key, $this);
  }

  public function sort() {
    sort($this);
    return $this;
  }

  public function keySort() {
    ksort($this);
    return $this;
  }

  public function reverseKeySort() {
    krsort($this);
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

}
