<?php

interface ArrayLike {
    public function count($size);

    public function max();

    public function min();

    public function has();

    public function indexOf($value, $startingIndex);

    public function difference();

    public function intersect();

    public function merge($mergee);

    public function reverse();

    public function slice($offeset, $length = null, $preserve = false);

    public function splice($offset, $length, $replacement);

    public function chunk($size);

    public function intersperse($value);
}
