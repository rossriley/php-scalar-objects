<?php
namespace Spl\Scalars;

class NullHandler
{

    public function toArray()
    {
        return [];
    }

    public function toJSON()
    {
        return json_encode([]);
    }

}
