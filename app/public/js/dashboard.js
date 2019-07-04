///<reference path="../../node_modules/@types/jquery/JQueryStatic.d.ts"/>
var STATUS = ["Sent", "Read", "Building", "Ready"];
$(document).ready(function () {
    $(".td-status").each(function (index, element) {
        element.innerHTML = STATUS[parseInt(element.innerHTML)];
    });
});
