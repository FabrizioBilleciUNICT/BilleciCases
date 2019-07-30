var PRICE_BLACK : number, PRICE_BLUE : number, PRICE_RED : number, PRICE_YELLOW : number;
var PRICE_HANDLE : number, PRICE_SURFACE : number, PRICE_SHAPED : number, PRICE_NO_SHAPED : number;
var colors = {};
var MODELS = {};

interface IFlightCase {
    name: string;
    measures: string[];
    color: string;
    shaped: boolean;
    handles: number;
    price: number;
}

class FlightCase implements IFlightCase {
    public name: string;
    public color: string;
    public measures: string[];
    public shaped: boolean;
    public handles: number;
    public price: number = 0;

    constructor(name: string, color: string, measures: string, shaped:boolean, handles: string){
        this.name = name;
        this.color = color;
        this.measures = measures.split("*").length == 3? measures.split("*"):['10','10','10'];
        this.shaped = shaped;
        this.handles = parseInt(handles);
    }

    public getPrice(): number {
        return this.handles * PRICE_HANDLE + this.getMeasuresSurface() * PRICE_SURFACE * colors[this.color] +
            (this.shaped? PRICE_SHAPED:PRICE_NO_SHAPED);
    }

    getMeasuresSurface(): number {
        return parseInt(this.measures[0]) * parseInt(this.measures[1]) * parseInt(this.measures[2]);
    }

    public getColorName() : string {
        return this.color;
    }
}

$(document).ready(function() {
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
    const custom = templates['Custom'];
    // @ts-ignore
    const piano = templates['Piano'];
    // @ts-ignore
    const pizza = templates['Pizza'];
    // @ts-ignore
    const telescope = templates['Telescope'];
    // @ts-ignore
    const cables = templates['Cables'];

    const MODEL0: IFlightCase =
        new FlightCase(custom['name'], custom['color'], custom['measures'], custom['shaped'] === "1", custom['handles']);

    const MODEL1: IFlightCase =
        new FlightCase(piano['name'], piano['color'], piano['measures'], piano['shaped'] === "1", piano['handles']);

    const MODEL2: IFlightCase =
        new FlightCase(pizza['name'], pizza['color'], pizza['measures'], pizza['shaped'] === "1", pizza['handles']);

    const MODEL3: IFlightCase =
        new FlightCase(telescope['name'], telescope['color'], telescope['measures'], telescope['shaped'] === "1", telescope['handles']);

    const MODEL4: IFlightCase =
        new FlightCase(cables['name'], cables['color'], cables['measures'], cables['shaped'] === "1", cables['handles']);

    MODELS = {
        'Custom' : MODEL0,
        'Piano' : MODEL1,
        'Pizza' : MODEL2,
        'Telescope' : MODEL3,
        'Cables' : MODEL4
    };
});


