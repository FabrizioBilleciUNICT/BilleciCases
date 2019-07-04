

const COLORS: string[] = ["#000000", "#ff0000", "#5522ff", "#eeaa00"];
const MODEL_IDS: number[] = [];
const PRICE_HANDLE = 30;
const PRICE_SURFACE = 0.01;
const PRICE_SHAPED = 60;
const PRICE_NO_SHAPED = 20;
const COLOR_PRICE = {
    "#000000":0.01,
    "#ff0000":0.02,
    "#5522ff":0.03,
    "#eeaa00":0.02
};


interface IFlightCase {
    measures: Array<number>;
    color: string;
    model_id: number;
    shaped: boolean;
    handles: number;
    price: number;
}

class FlightCase implements IFlightCase {
    public color: string;
    public measures: Array<number>;
    public model_id: number;
    public shaped: boolean;
    public handles: number;
    public price: number = 0;

    constructor(color: string, measures: Array<number>, model_id: number, shaped:boolean, handles: number){
        this.color = color;
        this.measures = measures;
        this.model_id = model_id;
        this.shaped = shaped;
        this.handles = handles;
    }

    public getPrice(): number {
        return this.handles * PRICE_HANDLE + this.getMeasuresSurface() * PRICE_SURFACE * COLOR_PRICE[this.color] +
            (this.shaped? PRICE_SHAPED:PRICE_NO_SHAPED);
    }

    getMeasuresSurface(): number {
        return this.measures[0] * this.measures[1] * this.measures[2];
    }
}

// TEMPLATES //
const MODEL1: IFlightCase = new FlightCase(COLORS[0], [30, 40, 60], MODEL_IDS[0],true,2);
const MODEL2: IFlightCase = new FlightCase(COLORS[1], [40, 20, 40], MODEL_IDS[1],false,1);
const MODEL3: IFlightCase = new FlightCase(COLORS[2], [30, 40, 40], MODEL_IDS[3],true,4);
const MODEL4: IFlightCase = new FlightCase(COLORS[3], [60, 50, 50], MODEL_IDS[4],true,4);
