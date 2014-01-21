<?php
namespace Spl\Scalars;

class Nulls {

  public function toArray(){
    return [];
  }

  public function toJSON() {
    return json_encode([]);
  }

}
