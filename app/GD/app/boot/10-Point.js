/**
 * @property {number} x
 * @property {number} y
 */
class Point{
    x;
    y;

    /**
     * @param {number} x
     * @param {number} y
     * @returns {Point}
     */
    constructor(x=0,y=0) {
        return DMI.Models.Point.instance(x,y);
    }
}
/**
 * 
 * @param {number} x 
 * @param {number} y
 * @returns {Point}
 */
function point(x=0,y=0){
    return new Point(x,y);
}
