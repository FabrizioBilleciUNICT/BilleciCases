var COLORS = [
    [0, "Black", "#000000", 0.01],
    [1, "Red", "#ff0000", 0.02],
    [2, "Blue", "#5522ff", 0.03],
    [3, "Yellow", "#eeaa00", 0.02]
];
var PRICE_HANDLE = 0;
var PRICE_SURFACE = 0.01;
var PRICE_SHAPED = 60;
var PRICE_NO_SHAPED = 20;
var Color = /** @class */ (function () {
    function Color(arr) {
        this.id = arr[0];
        this.name = arr[1];
        this.value = arr[2];
        this.price = arr[3];
    }
    return Color;
}());
var FlightCase = /** @class */ (function () {
    function FlightCase(name, color, measures, shaped, handles) {
        this.price = 0;
        this.name = name;
        this.color = color;
        this.measures = measures.split("*").length == 3 ? measures.split("*") : ['10', '10', '10'];
        this.shaped = shaped;
        this.handles = handles;
    }
    FlightCase.prototype.getPrice = function () {
        return this.handles * PRICE_HANDLE + this.getMeasuresSurface() * PRICE_SURFACE * this.color.price +
            (this.shaped ? PRICE_SHAPED : PRICE_NO_SHAPED);
    };
    FlightCase.prototype.getMeasuresSurface = function () {
        return parseInt(this.measures[0]) * parseInt(this.measures[1]) * parseInt(this.measures[2]);
    };
    FlightCase.prototype.getColorName = function () {
        return this.color.name;
    };
    return FlightCase;
}());
var MODELS = [];
$(document).ready(function () {
    // @ts-ignore
    PRICE_HANDLE = parseFloat(components['handle']);
    // @ts-ignore
    PRICE_SURFACE = parseFloat(components['surface']);
    // @ts-ignore
    COLORS[0][3] = parseFloat(components['surface_black']);
    // @ts-ignore
    COLORS[1][3] = parseFloat(components['surface_red']);
    // @ts-ignore
    COLORS[2][3] = parseFloat(components['surface_blue']);
    // @ts-ignore
    COLORS[3][3] = parseFloat(components['surface_yellow']);
    // @ts-ignore
    PRICE_SHAPED = parseFloat(components['shape']);
    // @ts-ignore
    PRICE_NO_SHAPED = parseFloat(components['noShape']);
    // TEMPLATES //
    var MODEL0 = new FlightCase("Custom", new Color(COLORS[0]), "40*40*40", false, 2);
    var MODEL1 = new FlightCase("Piano", new Color(COLORS[0]), "50*100*30", true, 2);
    var MODEL2 = new FlightCase("Pizza", new Color(COLORS[1]), "40*40*60", false, 1);
    var MODEL3 = new FlightCase("Telescope", new Color(COLORS[3]), "100*60*60", true, 4);
    var MODEL4 = new FlightCase("Cables", new Color(COLORS[2]), "60*50*50", false, 4);
    MODELS = [MODEL0, MODEL1, MODEL2, MODEL3, MODEL4];
});
