/**
 * @property {number} x
 * @property {number} y
 */
class Vector{
    x;
    y;

    /**
     * @param {number} x
     * @param {number} y
     * @returns {Vector}
     */
    constructor(x=0,y=0) {
        return DMI.Models.Vector.instance(x,y);
    }
}
/**
 * @param {number} x 
 * @param {number} y 
 * @returns {Vector}
 */
function vector(x=0,y=0){
    return new Vector(x,y);
}
