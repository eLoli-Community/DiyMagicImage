<?php


namespace GD\Models;


class Vector
{
    public $x;
    public $y;

    public function __construct($x=0, $y=0)
    {
        $this->x = $x;
        $this->y = $y;
    }
}
