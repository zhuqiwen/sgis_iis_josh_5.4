window.dtColumnDefs = [
    // {
    //     "targets": [ 1 ],
    //     "visible": false
    // }
];


var add_form = '<form action="/admin/alum_study_fields" method="post" id="create_form">'
    + '<label for="study_field">Study Field</label>'
    + '<input class="form-control" type="text" id="study_field" name="study_field"></input>'

window.modal= {
    add:{
        title: "Add Study Field"
        , form: add_form
    }
};

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
    var form = '<form action="/admin/alum_study_fields/' + aData.id + '" method="put" id="' + form_id + '">'
        + '<label for="study_field">Study Field</label>'
        + '<input class="form-control" type="text" id="study_field" name="study_field" value="' + aData.study_field + '"></input>'
        + '</form>';

    // insert form and title into modal
    $('#alum_study_field_public_modal .modal-title').text('Edit Study Field');
    $('#alum_study_field_public_modal .modal-body').html(form);
    $('#alum_study_field_public_modal').modal('toggle');
});
