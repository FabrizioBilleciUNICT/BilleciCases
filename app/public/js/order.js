///<reference path="cases.ts"/>
///<reference path="../../node_modules/@types/jquery/JQueryStatic.d.ts"/>
var flightCase;
$(document).ready(function () {
    addColorOptions();
    startTemplates();
    var formorder = $("#formorder");
    var formeditorder = $("#formeditorder");
    var fo = document.querySelector("#formorder");
    var feo = document.querySelector("#formeditorder");
    $('#makeorder').click(function () { submitForm(formorder); });
    $('#editorder').click(function () { submitForm(formeditorder); });
    if (fo != undefined) {
        fo.addEventListener('change', function (e) {
            $('input[name="price"]').val(calculateNewPrice($('#formorder')));
        });
        calculateNewPrice($('#formorder'));
    }
    if (feo != undefined) {
        addStatusOptions();
        // @ts-ignore
        $('select[name="status"]').val(order['status']);
        // @ts-ignore
        $('select[name="color"]').val(order['color']);
        feo.addEventListener('change', function (e) {
            // @ts-ignore
            $('input[name="price"]').val(calculateEditedPrice(order, $('#formeditorder')));
        });
        // @ts-ignore
        calculateEditedPrice(order, $('#formeditorder'));
    }
});
function calculateNewPrice(form) {
    var values = {};
    $.each(form.serializeArray(), function (i, field) {
        values[field.name] = field.value;
    });
    var name = "Custom";
    if (parseInt(values['type']) > -1)
        name = MODELS[parseInt(values['type'])].name;
    flightCase = new FlightCase(name, values['color'], values['measures'], !!values['shaped'], values['handles']);
    createCase();
    return flightCase.getPrice();
}
function calculateEditedPrice(order, form) {
    var values = {};
    $.each(form.serializeArray(), function (i, field) {
        values[field.name] = field.value;
    });
    flightCase = new FlightCase(order.name, values['color'], order.measures, order.shaped === "Yes", order.handles);
    createCase();
    return flightCase.getPrice();
}
function submitForm(form) {
    var submitable = true;
    var values = {};
    $.each(form.serializeArray(), function (i, field) {
        //if(field.name === "color")field.value = COLORS[parseInt(field.value)][1].toString();
        if (field.name === "measures") {
            if (field.value.split("*").length != 3)
                submitable = false;
        }
        values[field.name] = field.value;
    });
    if (!submitable)
        alert("Measures must have format: x*y*z");
    else
        form.submit();
}
function addStatusOptions() {
    var options = "";
    states.forEach(function (element) {
        options += "<option value=" + element + ">" + element + "</option>";
    });
    $('label[for="status"]').after("<select class=\"form-control\" name=\"status\">" + options + "</select>");
}
function addColorOptions() {
    var options = "";
    for (var color in colors) {
        options += "<option value=" + color + ">" + color + "</option>";
    }
    $('label[for="color"]').after("<select class=\"form-control\" name=\"color\">" + options + "</select>");
}
function startTemplates() {
    var htmlString = "";
    var table = $("#table-templates");
    Object.keys(MODELS).forEach(function (key) {
        htmlString +=
            "<td><label class='radio'><input type=\"radio\" name=\"type\" value="
                + MODELS[key]['name'] + "><span>" + MODELS[key]['name'] + "</span></label></td>";
    });
    table.html("<tr><form id='templatesradio'>" + htmlString + "</form></tr>");
    var inMeasures = $('input[name="measures"]');
    var inColor = $('select[name="color"]');
    var inShaped = $('input[name="shaped"]');
    var inHandles = $('select[name="handles"]');
    $("input[type=radio]").click(function () {
        // @ts-ignore
        var key = this.value;
        inMeasures.val(MODELS[key].measures.toString().replace(/,/g, "*"));
        inColor.val(MODELS[key].color);
        inShaped.prop('checked', MODELS[key].shaped);
        inHandles.val(MODELS[key].handles);
        var isCustom = key === 'Custom';
        inMeasures.prop('readonly', !isCustom);
        inShaped.prop('readonly', !isCustom);
        inHandles.prop('readonly', !isCustom);
    });
}
function createCase() {
    var measures = [flightCase.measures[0], flightCase.measures[2], flightCase.measures[1]];
    var stage = $("#stage");
    // @ts-ignore
    var box = Sprite3D.box(measures[0], measures[1], measures[2], ".box1", flightCase.handles);
    box.rotate(-45, -45, 0).scale(2.5).update();
    stage.html(box);
    box.addEventListener("click", onBoxClick, false);
    //change case's color
    var color = flightCase.getColorName().toLowerCase();
    $(".box1 > *").css('backgroundImage', 'url(/img/materials/' + color + '.jpg)');
    //change position
    box.addClass("box");
    function onBoxClick(e) {
        // NOTE :
        // In this listener function, "this" holds the reference to the box object,
        // and "e.target" points to the cube's face that was clicked - *cool*
        // let's add some *relative* rotation, and it will result
        // in a nice animation thanks to the CSS transition defined above
        //this.rotate( (e.pageY-window.innerHeight*.5), -(e.pageX-window.innerWidth*.5), 0 ).update();
    }
}
