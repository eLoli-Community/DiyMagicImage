<?php


namespace GD\Models;


use App\GD\Base;

class Font
{
    public $path;

    public function __construct($name)
    {
        $this->path = Base::res($name,'font');
    }
}
