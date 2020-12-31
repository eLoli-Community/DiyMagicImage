/**
 * @property {number} red
 * @property {number} green
 * @property {number} blue
 * @property {number} alpha
 */
class Color{
    red;
    green;
    blue;
    alpha;
    /**
     * @param {number} red
     * @param {number} green
     * @param {number} blue
     * @param {number} alpha
     * @returns {Color}
     */
    constructor(red=0, green=0, blue=0, alpha =0) {
        return DMI.Models.Color.instance(red,green,blue,alpha);
    };

    /**
     * @param {string} color
     * @returns {Color}
     */
    static fromHex(color='000000'){
        return DMI.Models.Color.fromHex(color);
    };
    /**
     * @param {string} color
     * @returns {Color} 
     */
    setAsHex(color='000000')
    {
        return this;
    };
    /**
     * @returns {string}
     */
    getAsHex(){
        return '000000';
    };
}
/**
 * 
 * @param {number} red 
 * @param {number} green 
 * @param {number} b 
 * @param {number} alpha 
 * @returns {Color}
 */
function color(red,green,blue,alpha=0){
    return new Color(red,green,blue,alpha);
}
