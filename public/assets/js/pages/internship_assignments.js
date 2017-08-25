//convert serializeArray() into object format
function objectifyForm(formArray)
{
    var returnArray = {};
    for (var i = 0; i < formArray.length; i++){
        returnArray[formArray[i]['name']] = formArray[i]['value'];
    }
    return returnArray;
}


$(document).ready(function () {
    window.ajaxConfiguration = {};
    window.ajaxConfiguration.type = 'get';
    window.ajaxConfiguration.url = '';
    window.ajaxConfiguration.data = {};
    window.ajaxConfiguration.dataType = 'html';
    window.ajaxConfiguration.error = function (xhr, ajaxOptions, thrownError) {
        var e = window.open();
        e.document.write(xhr.responseText);
    };

});


$(document).on('change', '#internship_select', function () {
    // console.log($(this).val());

    ajaxConfiguration.data.internship_id = $(this).val();

    ajaxConfiguration.url = '/internship/assignment/get';
    ajaxConfiguration.success = function (returned_data) {
        // console.log(returned_data);
        $('#panel_assignments .panel-body').html(returned_data);
        $('a[href="#panel_assignments"]').trigger('click');

    };
    $.ajax(ajaxConfiguration);
});

$(document).on('click', 'button[type="submit"]', function (e) {
    e.preventDefault();
    // console.log($(this.form));
    // console.log($(this).attr('data-record-id'));

    var form = $(this.form);
    // console.log(form.attr('method'));
    // console.log(form.children('textarea').val());


    ajaxConfiguration.type = 'put';
    ajaxConfiguration.url = form.attr('action');
    ajaxConfiguration.data = { record_id: $(this).attr('data-record-id')};
    ajaxConfiguration.data.intern_journal_content = form.children('textarea').val();
    ajaxConfiguration.data.intern_reflection_content = form.children('textarea').val();

    // merge site evaluation data with ajax data
    var intern_site_evaluation_data = objectifyForm(form.serializeArray());
    $.extend(ajaxConfiguration.data, intern_site_evaluation_data);

    console.log(ajaxConfiguration.data);
    ajaxConfiguration.success = function (returned_data) {
        // console.log(returned_data);
        $('#panel_assignments .panel-body').html(returned_data);
    };

    $.ajax(ajaxConfiguration)
});


