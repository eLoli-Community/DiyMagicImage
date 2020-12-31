var DMI = PHP.DMI;
PHP=undefined;

class Box{
     constructor(from=point(0,0),way=vector(0,0)) {
         this.from=new Point(
             way.x < 0 ? from.x + way.x : from.x,
             way.y < 0 ? from.y + way.y : from.y
         );
         this.way=new Vector(
             Math.abs(way.x),
             Math.abs(way.y)
         );
     }
}
class Color{
    constructor(red=0, green=0, blue=0, alpha =0) {
        this.red=red;
        this.green=green;
        this.blue=blue;
        this.alpha=alpha;
    }
}

var Font = DMI.Models.Font;
function font(name ='msyh.ttf') {
    return Font.instance(name);
}

var Image = DMI.Models.Image;
function image(name ='map.png') {
    return Image.fromFile(name);
}

var Point = DMI.Models.Point;
function point(x=0,y=0){
    return Point.instance(x,y);
}

var Vector = DMI.Models.Vector;
function vector(x=0,y=0){
    return Vector.instance(x,y);
}
