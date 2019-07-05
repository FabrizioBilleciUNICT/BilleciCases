///<reference path="../../node_modules/@types/jquery/JQueryStatic.d.ts"/>
const STATUS = ["Sent", "Read", "Building", "Ready", "Done"];

$(document).ready(function(){
    $(".td-status").each(function (index, element) {
       element.innerHTML = STATUS[parseInt(element.innerHTML)];
    });
});
