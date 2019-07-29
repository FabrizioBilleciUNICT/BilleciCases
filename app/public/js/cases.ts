

const COLORS = [
    [0, "Black", "#000000", 0.01],
    [1, "Red", "#ff0000", 0.02],
    [2, "Blue", "#5522ff", 0.03],
    [3, "Yellow", "#eeaa00", 0.02]
];
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
    measures: string[];
    color: IColor;
    shaped: boolean;
    handles: number;
    price: number;
}

class FlightCase implements IFlightCase {
    public name: string;
    public color: IColor;
    public measures: string[];
    public shaped: boolean;
    public handles: number;
    public price: number = 0;

    constructor(name: string, color: IColor, measures: string, shaped:boolean, handles: number){
        this.name = name;
        this.color = color;
        this.measures = measures.split("*").length == 3? measures.split("*"):['10','10','10'];
        this.shaped = shaped;
        this.handles = handles;
    }

    public getPrice(): number {
        return this.handles * PRICE_HANDLE + this.getMeasuresSurface() * PRICE_SURFACE * this.color.price +
            (this.shaped? PRICE_SHAPED:PRICE_NO_SHAPED);
    }

    getMeasuresSurface(): number {
        return parseInt(this.measures[0]) * parseInt(this.measures[1]) * parseInt(this.measures[2]);
    }

    public getColorName() : string {
        return this.color.name;
    }
}

// TEMPLATES //
const MODEL1: IFlightCase = new FlightCase("Piano", new Color(COLORS[0]), "50*100*30", true,2);
const MODEL2: IFlightCase = new FlightCase("Pizza", new Color(COLORS[1]), "40*40*60", false,1);
const MODEL3: IFlightCase = new FlightCase("Telescope", new Color(COLORS[3]), "100*60*60", true,4);
const MODEL4: IFlightCase = new FlightCase("Cables", new Color(COLORS[2]), "60*50*50", false,4);
const MODELS: IFlightCase[] = [MODEL1, MODEL2, MODEL3, MODEL4];
