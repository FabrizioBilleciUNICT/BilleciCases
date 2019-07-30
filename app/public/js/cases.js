var PRICE_BLACK, PRICE_BLUE, PRICE_RED, PRICE_YELLOW;
var PRICE_HANDLE, PRICE_SURFACE, PRICE_SHAPED, PRICE_NO_SHAPED;
var colors = {};
var MODELS = {};
var FlightCase = /** @class */ (function () {
    function FlightCase(name, color, measures, shaped, handles) {
        this.price = 0;
        this.name = name;
        this.color = color;
        this.measures = measures.split("*").length == 3 ? measures.split("*") : ['10', '10', '10'];
        this.shaped = shaped;
        this.handles = parseInt(handles);
    }
    FlightCase.prototype.getPrice = function () {
        return this.handles * PRICE_HANDLE + this.getMeasuresSurface() * PRICE_SURFACE * colors[this.color] +
            (this.shaped ? PRICE_SHAPED : PRICE_NO_SHAPED);
    };
    FlightCase.prototype.getMeasuresSurface = function () {
        return parseInt(this.measures[0]) * parseInt(this.measures[1]) * parseInt(this.measures[2]);
    };
    FlightCase.prototype.getColorName = function () {
        return this.color;
    };
    return FlightCase;
}());
$(document).ready(function () {
    // @ts-ignore
    PRICE_HANDLE = parseFloat(components['handle']);
    // @ts-ignore
    PRICE_SURFACE = parseFloat(components['surface']);
    // @ts-ignore
    PRICE_BLACK = parseFloat(components['surface_black']);
    // @ts-ignore
    PRICE_RED = parseFloat(components['surface_red']);
    // @ts-ignore
    PRICE_BLUE = parseFloat(components['surface_blue']);
    // @ts-ignore
    PRICE_YELLOW = parseFloat(components['surface_yellow']);
    // @ts-ignore
    PRICE_SHAPED = parseFloat(components['shape']);
    // @ts-ignore
    PRICE_NO_SHAPED = parseFloat(components['noShape']);
    colors = {
        'Black': PRICE_BLACK,
        'Blue': PRICE_BLUE,
        'Red': PRICE_RED,
        'Yellow': PRICE_YELLOW
    };
    // TEMPLATES //
    // @ts-ignore
    var custom = templates['Custom'];
    // @ts-ignore
    var piano = templates['Piano'];
    // @ts-ignore
    var pizza = templates['Pizza'];
    // @ts-ignore
    var telescope = templates['Telescope'];
    // @ts-ignore
    var cables = templates['Cables'];
    var MODEL0 = new FlightCase(custom['name'], custom['color'], custom['measures'], custom['shaped'] === "1", custom['handles']);
    var MODEL1 = new FlightCase(piano['name'], piano['color'], piano['measures'], piano['shaped'] === "1", piano['handles']);
    var MODEL2 = new FlightCase(pizza['name'], pizza['color'], pizza['measures'], pizza['shaped'] === "1", pizza['handles']);
    var MODEL3 = new FlightCase(telescope['name'], telescope['color'], telescope['measures'], telescope['shaped'] === "1", telescope['handles']);
    var MODEL4 = new FlightCase(cables['name'], cables['color'], cables['measures'], cables['shaped'] === "1", cables['handles']);
    MODELS = {
        'Custom': MODEL0,
        'Piano': MODEL1,
        'Pizza': MODEL2,
        'Telescope': MODEL3,
        'Cables': MODEL4
    };
});
