var COLORS = [
    [0, "black", "#000000", 0.01],
    [1, "red", "#ff0000", 0.02],
    [2, "blue", "#5522ff", 0.03],
    [3, "yellow", "#eeaa00", 0.02]
];
var MODEL_IDS = [];
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
    function FlightCase(name, color, measures, model_id, shaped, handles) {
        this.price = 0;
        this.name = name;
        this.color = color;
        this.measures = measures;
        this.model_id = model_id;
        this.shaped = shaped;
        this.handles = handles;
    }
    FlightCase.prototype.getPrice = function () {
        return this.handles * PRICE_HANDLE + this.getMeasuresSurface() * PRICE_SURFACE * this.color.price +
            (this.shaped ? PRICE_SHAPED : PRICE_NO_SHAPED);
    };
    FlightCase.prototype.getMeasuresSurface = function () {
        return this.measures[0] * this.measures[1] * this.measures[2];
    };
    return FlightCase;
}());
// TEMPLATES //
var MODEL1 = new FlightCase("Piano", new Color(COLORS[0]), [50, 100, 30], MODEL_IDS[0], true, 2);
var MODEL2 = new FlightCase("Pizza", new Color(COLORS[1]), [40, 40, 60], MODEL_IDS[1], false, 1);
var MODEL3 = new FlightCase("Telescope", new Color(COLORS[3]), [100, 60, 60], MODEL_IDS[3], true, 4);
var MODEL4 = new FlightCase("Cables", new Color(COLORS[2]), [60, 50, 50], MODEL_IDS[4], false, 4);
var MODELS = [MODEL1, MODEL2, MODEL3, MODEL4];
