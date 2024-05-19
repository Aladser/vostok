export function getCoords(el) {
    if (el) {
        let box = el.getBoundingClientRect();

        return {
            top: box.top + pageYOffset,
            left: box.left + pageXOffset
        };
    } else {
        return false
    }
}