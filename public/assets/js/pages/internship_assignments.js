
$(document).ready(function () {
    window.ajaxConfigration = {};
    window.ajaxConfigration.type = 'get';
    window.ajaxConfigration.url = '';
    window.ajaxConfigration.data = {};
    window.ajaxConfigration.dataType = 'html';
    window.ajaxConfigration.error = function (xhr, ajaxOptions, thrownError) {
        var e = window.open();
        e.document.write(xhr.responseText);
    };

});


$(document).on('change', '#internship_select', function () {
    // console.log($(this).val());

    ajaxConfigration.data.internship_id = $(this).val();

    ajaxConfigration.url = '/internship/assignment/get';
    ajaxConfigration.success = function (returned_data) {
        console.log(returned_data);
    };
    $.ajax(ajaxConfigration);
});


