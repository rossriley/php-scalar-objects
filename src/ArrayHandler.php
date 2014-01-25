<?php
namespace Spl\Scalars;

class ArrayHandler extends ScalarObjectHandler
{

    public function isArray() {
        return true;
    }

    public function any()
    {
        $any = false;
        foreach($this as $val) {
            if($val) $any = true;
        }
        return $any;

    }

    public function all()
    {
        $all = true;
        foreach($this as $val) {
            if(!$val) $all = false;
        }
        return $all;

    }

    public function compact()
    {
        $array = $this;
        return array_filter($array);
    }

    public function chunk($size)
    {
        $this->verifyInteger($size, "chunk");
        return array_chunk($this, $size);
    }

    public function column($key)
    {
        $this->verifyString($key, "column");
        return array_column($this, $key);
    }

    public function combine($arrayVals)
    {
        $this->verifyArray($arrayVals, "combine");
        return array_combine($this,$arrayVals);
    }

    public function count() {
        return count($this);
    }

    public function countValues()
    {
        return array_count_values($this);
    }

    public function diff($array)
    {
        $this->verifyArray($array, "diff");
        return array_diff($this, $array);
    }

    public function difference($array)
    {
        $this->verifyArray($array, "diff");
        return array_diff($this, $array);
    }

    public function each($callback)
    {
        $this->verifyCallable($callback);
        array_walk_recursive($this, $callback);
        return $this;
    }

    public function filter($callback)
    {
        $this->verifyCallable($callback);
        return array_filter($this, $callback);
    }

    public function has($value)
    {
        return in_array($value, $this, true);
    }

    public function hasKey($key)
    {
        $this->verifyString($key, "hasKey");
        return array_key_exists($key, $this);
    }

    public function indexOf($value)
    {
        return array_search($value, $this);
    }

    public function intersect($array)
    {
        $this->verifyArray($array, "intersect");
        return array_intersect($this, $array);
    }

    public function intersperse($value)
    {
        $array = $this;
        $chunk = array_chunk($array, 1);

        $intersperser = function(&$row) {$row[1]="lalal";};
        foreach($chunk as &$row) {
            $row[1] = $value;
        }
        $result = call_user_func_array('array_merge', $chunk);
        array_pop($result);
        return $result;
    }

    public function join($on="")
    {
        return implode($on, $this);
    }

    public function keys()
    {
        return array_keys($this);
    }

    public function keySort()
    {
        ksort($this);
        return $this;
    }

    public function map($callback, $arguments = null)
    {
        $array = $this;
        if(null !== $callback) {
            $this->verifyCallable($callback);
        }
        if(null === $arguments) {
            $result = array_map($callback, $array);
        } else {
            $args = func_get_args();
            array_shift($args);
            array_unshift($args, $callback, $array);
            $result = call_user_func_array("array_map", $args);
        }

        return $result;

    }

    public function max()
    {
        return max($this);
    }

    public function merge($array)
    {
        $this->verifyArray($array, "merge");
        return array_merge($this, $array);
    }

    public function min()
    {
        return min($this);
    }

    public function push($val)
    {
        array_push($this, $val);
        return $this;
    }

    public function rand($number = 1)
    {
        $r = array_rand($this, $number);
        return $this[$r];
    }

    public function reduce($callback, $initial = null)
    {
        $this->verifyCallable($callback);
        return array_reduce($this, $callback, $initial);
    }

    public function reindex($by = null)
    {
        if(null === $by) return array_values($this);
        if(is_callable($by)) {
            $keys = array_map($by, $this);
            return array_combine($keys, array_values($this));
        }
    }

    public function reverse()
    {
        return array_reverse($this);
    }

    public function reverseKeySort()
    {
        krsort($this);
        return $this;
    }

    public function slice($offset, $length = null, $preserve = false)
    {
        $this->verifyInteger($offset, "slice");
        return array_slice($this, $offset, $length, $preserve);
    }

    public function splice($offset, $length = null, $replacement = null)
    {
        $this->verifyInteger($offset, "splice");
        $array = $this;
        if(null === $length) {
            $extracted = array_splice($array, $offset);
        } else {
            $extracted = array_splice($array, $offset, $length, $replacement);
        }

        return $array;
    }

    public function sort($flags = null)
    {
        $array = $this;
        $result = sort($array, $flags);

        if ($result === false) {
            throw new \InvalidArgumentException("Array object could not be sorted");
        }

        return $array;
    }

    public function sum()
    {
        return array_sum($this);
    }

    public function toArray()
    {
        $array = $this;
        return $array;
    }

    public function toFloat()
    {
        return float($this);
    }

    public function toInt()
    {
        return int($this);
    }

    public function toJSON()
    {
        return json_encode($this);
    }


    public function toString()
    {
        return string($this);
    }

    public function values()
    {
        return array_values($this);
    }




    protected function verifyInteger($input = null, $methodName = "")
    {
        if (false === is_int($input)) {
            throw new \InvalidArgumentException("Argument passed to $methodName has to be an integer");
        }
    }

    protected function verifyString($input = null, $methodName = "")
    {
        if (false === is_string($input)) {
            throw new \InvalidArgumentException("Argument passed to $methodName has to be a string");
        }
    }

    protected function verifyArray($input = null, $methodName = "")
    {
        if (false === is_array($input)) {
            throw new \InvalidArgumentException("Argument passed to $methodName has to be a array");
        }
    }

    protected function verifyCallable($input = null, $methodName = "")
    {
        if (false === is_callable($input)) {
            throw new \InvalidArgumentException("Argument passed to $methodName needs to be callable");
        }
    }


}
