/**
 * @property {Point} from
 * @property {Vector} way
 */
class Box{
    from;
    way;

    /**
     * @param {Point} from
     * @param {Vector} way
     * @returns {Box}
     */
    constructor(from=point(0,0),way=vector(0,0)) {
        return DMI.Models.Box.instance(from,way);
    }
}
/**
 * 
 * @param {Point} from 
 * @param {Vector} way 
 * @returns {Box}
 */
function box(from=point(0,0),way=vector(0,0)){
    return new Box(from,way);
}