class Image{
    /**
     * @param {string} name
     * @returns {Image}
     */
    constructor(name='map.png') {
        return DMI.Models.Image.fromFile(name);
    };
    destroy(){};

    /**
     * @param {Vector} size
     * @returns {Image}
     */
    static create(size=vector(256,256)){
        return DMI.Models.Image.create(size);
    };
    /**
     * @param {string} data
     * @returns {Image}
     */
    static fromString(data){
        return DMI.Models.Image.fromString(data);
    };
    /**
     * @returns {Vector}
     */
    getSize(){
        return new Vector();
    };
    /**
     * @returns {number}
     */
    getWidth(){
        return 0;
    };
    /**
     * @returns {number}
     */
    getHeight(){
        return 0;
    };
    /**
     * @returns {string}
     */
    getAsString(){
        return '';
    };
    /**
     * @param {Point} s 
     * @param {Color} color 
     */
    fill(s,color){};
    /**
     * @param {Vector} new_size 
     */
    resize(new_size){};
    /**
     * @param {Image} image 
     * @param {Box|Point} from 
     * @param {Box|Point} to 
     * @param {number} alpha 
     * @returns {boolean}
     */
    attachImage(image,from,to,alpha){
        return true;
    };
    /**
     * @param {Image} image 
     * @param {Box|Point} from 
     * @param {Box|Point} to 
     * @param {number} alpha 
     * @returns {boolean}
     */
    drawImage(image,from,to,alpha){
        return true;
    };
    /**
     * @param {string} text 
     * @param {Point} point 
     * @param {number} size 
     * @param {Font} font 
     * @param {Color} color 
     * @param {number} angle 
     */
    drawText(text,point,size,font,color,angle){};
}
/**
 * @param {string} name 
 * @returns {Image}
 */
function image(name='map.png'){
    return new Image(name);
}
