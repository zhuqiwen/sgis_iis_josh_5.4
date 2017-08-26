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

});


$(document).on('change', '#internship_select', function () {

    console.log();
    var internship_title = 'Assignments for ' + $(this).find('option:selected').text();

    $.ajax({
        type: 'get',
        url: '/internship/assignment/get',
        data: {internship_id: $(this).val()},
        dataType: 'html',
        success: function (returned_data) {
            $('#panel_assignments').children('.panel-body').html(returned_data);
            $('#assignment_panel_title').html(internship_title);
            $('a[href="#panel_assignments"]').trigger('click');
        },
        error: function (xhr, ajaxOptions, thrownError) {
            var e = window.open();
            e.document.write(xhr.responseText);
        }
    });
});

$(document).on('click', 'button[type="submit"]', function (e) {
    e.preventDefault();

    var form = $(this.form);

    var data = { record_id: $(this).attr('data-record-id')};
    data.intern_journal_content = form.find('#textarea').val();
    data.intern_reflection_content = form.find('#textarea').val();

    console.log(data.intern_reflection_content);

    // merge site evaluation data with ajax data
    var intern_site_evaluation_data = objectifyForm(form.serializeArray());
    $.extend(data, intern_site_evaluation_data);


    $.ajax({
        type: 'put',
        url: form.attr('action'),
        data: data,
        dataType: 'html',
        success: function (returned_data) {
            $('#panel_assignments').children('.panel-body').html(returned_data);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            var e = window.open();
            e.document.write(xhr.responseText);
        }
    });
});


