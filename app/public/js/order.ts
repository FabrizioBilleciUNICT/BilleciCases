///<reference path="cases.ts"/>
///<reference path="../../node_modules/@types/jquery/JQueryStatic.d.ts"/>
$(document).ready(function(){
    addColorOptions();
    startTemplates();

    let make = $('#makeorder');

    make.click( function() {
        submitForm($('#formorder'));
    });

    $('#editorder').click( function() {
        submitForm($('#formeditorder'));
    });


    make.on('keyup change paste', 'input, select, textarea', function(){
        console.log(make.serialize());
    });
});

function submitForm(form){
    let submitable = true;

    var values = {};
    $.each(form.serializeArray(), function(i, field) {
        if(field.name === "color")
            field.value = COLORS[parseInt(field.value)][1].toString();

        if(field.name === "measures") {
            if(field.value.split("*").length != 3)
                submitable = false;
        }

        values[field.name] = field.value;
    });

    console.log(values);

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

