<?php
namespace Spl\Scalars;

class Arrays {


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
