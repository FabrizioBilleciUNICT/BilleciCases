///<reference path="cases.ts"/>
///<reference path="../../node_modules/@types/jquery/JQueryStatic.d.ts"/>
$(document).ready(function () {
    addColorOptions();
    startTemplates();
    $('#makeorder').click(function () {
        submitForm($('#formorder'));
    });
    $('#editorder').click(function () {
        submitForm($('#formeditorder'));
    });
    $('#makeorder').on('keyup change paste', ':input', function () {
        console.log($('#makeorder').serialize());
    });
});
function submitForm(form) {
    var submitable = true;
    var values = {};
    $.each(form.serializeArray(), function (i, field) {
        if (field.name === "color")
            field.value = COLORS[parseInt(field.value)][1].toString();
        if (field.name === "measures") {
            if (field.value.split("*").length != 3)
                submitable = false;
        }
        values[field.name] = field.value;
    });
    console.log(values);
    if (!submitable)
        alert("Measures must have format: x*y*z");
    else
        form.submit();
}
function addColorOptions() {
    var options = "";
    COLORS.forEach(function (value, index, array) {
        options += "<option value=" + COLORS[index][0] + ">" + COLORS[index][1] + "</option>";
    });
    $('label[for="color"]').after("<select class=\"form-control\" name=\"color\">" + options + "</select>");
}
function startTemplates() {
    var htmlString = "<td><label class='radio'><input type=\"radio\" name=\"type\" value=\"-1\" checked><span>Custom</span></label></td>";
    var table = $("#table-templates");
    MODELS.forEach(function (element, index, array) {
        htmlString += "<td><label class='radio'><input type=\"radio\" name=\"type\" value=" + index.toString() + "><span>" + element.name + "</span></label></td>";
    });
    table.html("<tr><form id='templatesradio'>" + htmlString + "</form></tr>");
    var inMeasures = $('input[name="measures"]');
    var inColor = $('select[name="color"]');
    var inShaped = $('input[name="shaped"]');
    var inHandles = $('select[name="handles"]');
    $("input[type=radio]").click(function () {
        var index = parseInt(this.value);
        if (index >= 0 && index < MODELS.length) {
            inMeasures.val(MODELS[index].measures.toString().replace(/,/g, "*"));
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
