var COLORS = [
    [0, "Black", "#000000", 0.01],
    [1, "Red", "#ff0000", 0.02],
    [2, "Blue", "#5522ff", 0.03],
    [3, "Yellow", "#eeaa00", 0.02]
];
var PRICE_HANDLE = 30;
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
// TEMPLATES //
var MODEL1 = new FlightCase("Piano", new Color(COLORS[0]), "50*100*30", true, 2);
var MODEL2 = new FlightCase("Pizza", new Color(COLORS[1]), "40*40*60", false, 1);
var MODEL3 = new FlightCase("Telescope", new Color(COLORS[3]), "100*60*60", true, 4);
var MODEL4 = new FlightCase("Cables", new Color(COLORS[2]), "60*50*50", false, 4);
var MODELS = [MODEL1, MODEL2, MODEL3, MODEL4];
