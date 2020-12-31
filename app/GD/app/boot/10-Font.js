/**
 * @property {string} path
 */
class Font{
    path;
    /**
     * @param {string} name
     * @returns {Font}
     */
    constructor(name) {
        return DMI.Models.Font.instance(name);
    };
}
/**
 * @param {string} name
 * @returns {Font}
 */
function font(name){
    return new Font(name);
}
