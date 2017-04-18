/**
 * Created by wishwa on 2/15/2016.
 */
$(document).ready(function()
{
    $('#newEventDate').bootstrapMaterialDatePicker
    ({
        time: false,
        clearButton: true
    });

    $('#scheduleInterviewTime').bootstrapMaterialDatePicker
    ({
        date: false,
        shortTime: false,
        format: 'HH:mm'
    });

    $('#newEventStartTime').bootstrapMaterialDatePicker
    ({
        date: false,
        shortTime: false,
        format: 'HH:mm'
    });

    $('#newEventEndTime').bootstrapMaterialDatePicker
    ({
        date: false,
        shortTime: false,
        format: 'HH:mm'
    });

    /*var xaxisLabel = $("<div class='axisLabel xaxisLabel'></div>")
        .text("My X Label")
        .appendTo($('#barchart'));

    var yaxisLabel = $("<div class='axisLabel yaxisLabel'></div>")
        .text("Response Time (ms)")
        .appendTo($('#barchart'));*/
 });