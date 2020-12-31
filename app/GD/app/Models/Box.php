<?php


namespace GD\Models;

class Box
{
    public $from;
    public $way;

    /**
     * Box constructor.
     * @param Point|null $from
     * @param Vector|null $way
     */
    public function __construct($from=null, $way=null)
    {
        $this->from = $from?:new Point();
        $this->way = $way?:new Vector();
        $this->from=new Point(
            $this->way->x < 0 ? $this->from->x + $this->way->x : $this->from->x,
            $this->way->y < 0 ? $this->from->y + $this->way->y : $this->from->y
        );
        $this->way=new Vector(
            abs($way->x),
            abs($way->y)
        );
    }
}
