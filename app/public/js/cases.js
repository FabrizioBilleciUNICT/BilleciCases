var COLORS = ["#000000", "#ff0000", "#5522ff", "#eeaa00"];
var MODEL_IDS = [];
var PRICE_HANDLE = 30;
var PRICE_SURFACE = 0.01;
var PRICE_SHAPED = 60;
var PRICE_NO_SHAPED = 20;
var COLOR_PRICE = {
    "#000000": 0.01,
    "#ff0000": 0.02,
    "#5522ff": 0.03,
    "#eeaa00": 0.02
};
var FlightCase = /** @class */ (function () {
    function FlightCase(color, measures, model_id, shaped, handles) {
        this.price = 0;
        this.color = color;
        this.measures = measures;
        this.model_id = model_id;
        this.shaped = shaped;
        this.handles = handles;
    }
    FlightCase.prototype.getPrice = function () {
        return this.handles * PRICE_HANDLE + this.getMeasuresSurface() * PRICE_SURFACE * COLOR_PRICE[this.color] +
            (this.shaped ? PRICE_SHAPED : PRICE_NO_SHAPED);
    };
    FlightCase.prototype.getMeasuresSurface = function () {
        return this.measures[0] * this.measures[1] * this.measures[2];
    };
    return FlightCase;
}());
// TEMPLATES //
var MODEL1 = new FlightCase(COLORS[0], [30, 40, 60], MODEL_IDS[0], true, 2);
var MODEL2 = new FlightCase(COLORS[1], [40, 20, 40], MODEL_IDS[1], false, 1);
var MODEL3 = new FlightCase(COLORS[2], [30, 40, 40], MODEL_IDS[3], true, 4);
var MODEL4 = new FlightCase(COLORS[3], [60, 50, 50], MODEL_IDS[4], true, 4);
