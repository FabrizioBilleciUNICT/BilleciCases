

const COLORS = [
    [0, "black", "#000000", 0.01],
    [1, "red", "#ff0000", 0.02],
    [2, "blue", "#5522ff", 0.03],
    [3, "yellow", "#eeaa00", 0.02]
];

const MODEL_IDS: number[] = [];
const PRICE_HANDLE = 30;
const PRICE_SURFACE = 0.01;
const PRICE_SHAPED = 60;
const PRICE_NO_SHAPED = 20;

interface IColor {
    id: number;
    name: string;
    value: string;
    price: number;
}

class Color implements IColor {
    public id: number;
    public name: string;
    public value: string;
    public price: number;

    constructor(arr){
        this.id = arr[0];
        this.name = arr[1];
        this.value = arr[2];
        this.price = arr[3];
    }
}

interface IFlightCase {
    name: string;
    measures: Array<number>;
    color: IColor;
    model_id: number;
    shaped: boolean;
    handles: number;
    price: number;
}

class FlightCase implements IFlightCase {
    public name: string;
    public color: IColor;
    public measures: Array<number>;
    public model_id: number;
    public shaped: boolean;
    public handles: number;
    public price: number = 0;

    constructor(name: string, color: IColor, measures: Array<number>, model_id: number, shaped:boolean, handles: number){
        this.name = name;
        this.color = color;
        this.measures = measures;
        this.model_id = model_id;
        this.shaped = shaped;
        this.handles = handles;
    }

    public getPrice(): number {
        return this.handles * PRICE_HANDLE + this.getMeasuresSurface() * PRICE_SURFACE * this.color.price +
            (this.shaped? PRICE_SHAPED:PRICE_NO_SHAPED);
    }

    getMeasuresSurface(): number {
        return this.measures[0] * this.measures[1] * this.measures[2];
    }
}

// TEMPLATES //
const MODEL1: IFlightCase = new FlightCase("Piano", new Color(COLORS[0]), [50, 100, 30], MODEL_IDS[0],true,2);
const MODEL2: IFlightCase = new FlightCase("Pizza", new Color(COLORS[1]), [40, 40, 60], MODEL_IDS[1],false,1);
const MODEL3: IFlightCase = new FlightCase("Telescope", new Color(COLORS[3]), [100, 60, 60], MODEL_IDS[3],true,4);
const MODEL4: IFlightCase = new FlightCase("Cables", new Color(COLORS[2]), [60, 50, 50], MODEL_IDS[4],false,4);
const MODELS: IFlightCase[] = [MODEL1, MODEL2, MODEL3, MODEL4];
