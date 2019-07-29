///<reference path="cases.ts"/>
///<reference path="../../node_modules/@types/jquery/JQueryStatic.d.ts"/>

var flightCase;

$(document).ready(function(){
    addColorOptions();
    startTemplates();

    let formorder = $("#formorder");
    let formeditorder = $("#formeditorder");


    $('#makeorder').click( function() {
        submitForm(formorder);
    });

    $('#editorder').click( function() {
        submitForm(formeditorder);
    });

    let fo = document.querySelector("#formorder");
    if(fo!=undefined)
        fo.addEventListener('change', function(e) {
            $('input[name="price"]').val(calculateNewPrice($('#formorder')));
        });

    let feo = document.querySelector("#formeditorder");
    if(feo!=undefined) {
        $('select[name="color"]').val(getDefaultColor(order));

        feo.addEventListener('change', function (e) {
            $('input[name="price"]').val(calculateEditedPrice(order, $('#formeditorder')));
        });
    }
});

function getDefaultColor(order): number {
    for(let i=0; i<COLORS.length; i++)
        if(COLORS[i][1] === order.color)
            return i;
    return 0;
}

function calculateNewPrice(form): number {
    let values = {};
    $.each(form.serializeArray(), function(i, field) {
        values[field.name] = field.value;
    });

    let name = "Custom";
    if(parseInt(values['type']) > -1) name = MODELS[parseInt(values['type'])].name;

    flightCase = new FlightCase(
        name,
        new Color(COLORS[parseInt(values['color'])]),
        values['measures'],
        values['shaped'] === "on",
        parseInt(values['handles']));
    createCase();

    return flightCase.getPrice();
}

function calculateEditedPrice(order, form): number {
    let values = {};
    $.each(form.serializeArray(), function(i, field) {
        values[field.name] = field.value;
    });

    flightCase = new FlightCase(
        order.name,
        new Color(COLORS[parseInt(values['color'])]),
        order.measures,
        order.shaped === "Yes",
        order.handles);
    createCase();

    return flightCase.getPrice();
}



function submitForm(form){
    let submitable = true;

    let values = {};
    $.each(form.serializeArray(), function(i, field) {
        if(field.name === "color")
            field.value = COLORS[parseInt(field.value)][1].toString();

        if(field.name === "measures") {
            if(field.value.split("*").length != 3)
                submitable = false;
        }

        values[field.name] = field.value;
    });

    if(!submitable) alert("Measures must have format: x*y*z");
    else form.submit();
}

function addColorOptions() {
    let options = "";

    COLORS.forEach(function (value, index, array) {
        options +=  "<option value="+ COLORS[index][0] +">" + COLORS[index][1]  + "</option>";
    });

    $('label[for="color"]').after("<select class=\"form-control\" name=\"color\">" + options + "</select>");
}

function startTemplates() {
    let htmlString = "<td><label class='radio'><input type=\"radio\" name=\"type\" value=\"-1\" checked><span>Custom</span></label></td>";
    let table = $("#table-templates");

    MODELS.forEach(function (element, index, array) {
        htmlString += "<td><label class='radio'><input type=\"radio\" name=\"type\" value=" + index.toString() + "><span>" + element.name + "</span></label></td>";
    });

    table.html("<tr><form id='templatesradio'>" + htmlString + "</form></tr>");

    let inMeasures = $('input[name="measures"]');
    let inColor = $('select[name="color"]');
    let inShaped = $('input[name="shaped"]');
    let inHandles = $('select[name="handles"]');


    $("input[type=radio]").click(function(){
        let index = parseInt(this.value);

        if(index >= 0 && index < MODELS.length) {
            inMeasures.val(MODELS[index].measures.toString().replace(/,/g,"*"));
            inMeasures.prop('readonly', true);

            inColor.val(MODELS[index].color.id);

            inShaped.prop('checked', MODELS[index].shaped);
            inShaped.prop('readonly', true);

            inHandles.val(MODELS[index].handles);
            inHandles.prop('readonly', true);
        }
        else {
            inMeasures.val("");
            inMeasures.prop('readonly', false);
            inShaped.prop('readonly', false);
            inHandles.prop('readonly', false);
        }
    });
}


function createCase(){
    let measures = [10,10,10];
    if(flightCase != undefined) measures = [flightCase.measures[0], flightCase.measures[2], flightCase.measures[1]];

    let stage = $("#stage"); //Sprite3D.stage();
    let box = Sprite3D.box(measures[0], measures[1], measures[2], ".box1", flightCase.handles);
    box.rotate(-45, -45, 0).scale(2.5).update();
    stage.html(box);
    box.addEventListener( "click", onBoxClick, false);

    //change case's color
    let color = flightCase.getColorName().toLowerCase();
    $(".box1 > *").css('backgroundImage','url(../img/materials/' + color + '.jpg)');

    //change position
    box.addClass("box");


    function onBoxClick(e){
        // NOTE :
        // In this listener function, "this" holds the reference to the box object,
        // and "e.target" points to the cube's face that was clicked - *cool*

        // let's add some *relative* rotation, and it will result
        // in a nice animation thanks to the CSS transition defined above
        //this.rotate( (e.pageY-window.innerHeight*.5), -(e.pageX-window.innerWidth*.5), 0 ).update();
    }
}
