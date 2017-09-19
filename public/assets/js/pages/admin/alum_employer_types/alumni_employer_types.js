/*
 define parameters used by DataTable()
 */

window.dtColumnDefs = [
    // {
    //     "targets": [3, 5, 7, 8, 9, 10, 11, 12],
    //     "visible": false
    // }
];

// window.dtChildRow = {
//     "className":      'details-control',
//     "orderable":      false,
//     "data":           null,
//     "defaultContent": ''
// };

window.dtOrder = [[1, 'asc']];




// function used for child row
function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                    '<tr>'+
                        '<td><strong>Country:</strong></td>'+
                        '<td style="padding: 0 30px;">' + d.contact_country + '</td>' +
                    // '</tr>'+
                    // '<tr>'+
                        '<td><strong>Home Phone:</strong></td>'+
                        '<td style="padding: 0 30px;">'+d.contact_phone_home+'</td>'+
                    '</tr>'+
            '</table>';
}



var current_path = window.location.pathname;
window.datatableAjaxUrl = current_path + '/data';

/*
define form for add record modal
 */
var add_form = '<form action="' + current_path + '" method="post" id="create_form">'
    + '<div class="row">'
    + '<div class="col-md-12">'
    + '<div class="form-group">'
    + '<label for="employer_type">Employer Type</label>'
    + '<input type="text" class="form-control" id="employer_type" name="employer_type" placeholder="Employer Type" />'
    + '</div>'
    + '</div>'
    + '</div>'
    + '</form>';





window.modal= {
    add:{
        title: "Add Employer Type"
        , form: add_form
    }
};


/*
define what happen when clicking edit.
 */
$(document).on('click', '.edit', function (e) {
    e.preventDefault();

    var form_id = 'edit_form';
    // change modal submit button attribute
    $('#public_modal_submit_button')
        .addClass('btn-danger')
        .attr('form', form_id)
        .text('Update');
    // get row data
    var nRow = $(this).parents('tr')[0];
    var aData = window.datatable.row(nRow).data();

    // construct form and fill form with row data
    var form = '<form action="' + current_path + '/' + aData.id + '" method="put" id="' + form_id + '">'
            + '<div class="row">'
            + '<div class="col-md-12">'
            + '<div class="form-group">'
            + '<label for="employer_type">Employaer Type</label>'
            + '<input value="' + aData.employer_type + '" type="text" class="form-control" id="employer_type" name="employer_type" placeholder="Employer Type" />'
            + '</div>'
            + '</div>'
            + '</div>'
            + '</form>';

    // insert form and title into modal
    $('#alum_study_field_public_modal .modal-title').text('Edit Employer Type');
    $('#alum_study_field_public_modal .modal-body').html(form);
    $('#alum_study_field_public_modal').modal('toggle');
});


