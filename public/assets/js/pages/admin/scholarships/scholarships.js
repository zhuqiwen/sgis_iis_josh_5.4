/*
 define parameters used by DataTable()
 */

window.dtColumnDefs = [
    // {
    //     "targets": [3, 5, 7, 8, 9, 10, 11, 12],
    //     "visible": false
    // }
];

window.dtChildRow = {
    "className":      'details-control',
    "orderable":      false,
    "data":           null,
    "defaultContent": ''
};

// window.dtOrder = [[1, 'asc']];




// function used for child row
function format ( d ) {

    // console.log('window.datatable extra response data test');
    // console.log(window.datatable.ajax.json().age_group_frequency);
    // console.log(window.datatable.ajax.json().num_active_contacts);
    // // `d` is the original data object for the row
    // var events = d.events;
    // var event_names = '';
    // for(var i = 0; i < events.length; i++)
    // {
    //     event_names += events[i].event_name;
    //     event_names += '----';
    // }
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                    '<tr>'+
                        '<td><strong>Country:</strong></td>'+
                        '<td style="padding: 0 30px;">' + d.contact_country + '</td>' +
                    // '</tr>'+
                    // '<tr>'+
                        '<td><strong>Home Phone:</strong></td>'+
                        '<td style="padding: 0 30px;">'+d.contact_phone_home+'</td>'+
                        '<td><strong>Events:</strong></td>'+
                        '<td style="padding: 0 30px;">'+event_names+'</td>'+
                    '</tr>'+
            '</table>';
}


var current_path = window.location.pathname;

/*
define form for add record modal
 */
var add_form = '<form action="' + current_path + '" method="post" id="create_form">' +
    '<div class="container-fluid">' +
        //scholarship basic
        '<div class="row">' +
            '<div class="col-md-12">' +
                //introduction
                '<div class="row">' +
                    '<div class="col-md-12">' +
                    '</div>' +
                '</div>' +
                //award amount and deadline
                '<div class="row">' +
                    //award amoun
                    '<div class="col-md-6">' +
                    '</div>' +
                    //deadline
                    '<div class="col-md-6">' +
                    '</div>' +
                '</div>' +
                //donar
                '<div class="row">' +
                    '<div class="col-md-12">' +
                    '</div>' +
                '</div>' +
                //notes
                '<div class="row">' +
                    '<div class="col-md-12">' +
                    '</div>' +
                '</div>' +
            '</div>' +
        '</div>' +
        //criteria
        '<hr>' +
        '<div class="row">' +
            '<div class="col-md-12">' +
            '</div>' +
        '</div>' +
        //eligibility
        '<hr>' +
        '<div class="row">' +
            '<div class="col-md-12">' +
            '</div>' +
        '</div>' +
        //material
        '<hr>' +
        '<div class="row">' +
            '<div class="col-md-12">' +
            '</div>' +
        '</div>' +
        //process
        '<hr>' +
        '<div class="row">' +
            '<div class="col-md-12">' +
            '</div>' +
        '</div>' +
        //requirement
        '<hr>' +
        '<div class="row">' +
            '<div class="col-md-12">' +
            '</div>' +
        '</div>' +
    '</div>' +
    '</form>';





window.modal= {
    add:{
        title: "Add Scholarship"
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
            + '<div class="col-md-6">'
            + '<div class="form-group">'
            + '<label for="contact_salutation">Salutation</label>'
            + '<input value="' + aData.contact_salutation + '" type="text" class="form-control" id="contact_salutation" name="contact_salutation" placeholder="Salutation" />'
            + '</div>'
            + '<div class="form-group">'
            + '<label for="first_name">First Name</label>'
            + '<input value="' + aData.contact_first_name + '" type="text" class="form-control" id="first_name" name="contact_first_name" placeholder="First Name" />'
            + '</div>'
            + '<div class="form-group">'
            + '<label for="middle_name">Middle Name</label>'
            + '<input value="' + aData.contact_middle_name + '" type="text" class="form-control" id="middle_name" name="contact_middle_name" placeholder="Middle Name" />'
            + '</div>'
            + '<div class="form-group">'
            + '<label for="last_name">Last Name</label>'
            + '<input value="' + aData.contact_last_name + '" type="text" class="form-control" id="last_name" name="contact_last_name" placeholder="Last Name" />'
            + '</div>'
            + '<div class="form-group">'
            + '<label for="email">Email</label>'
            + '<input value="' + aData.contact_email + '" type="email" class="form-control" id="email" name="contact_email" placeholder="Email" />'
            + '</div>'
            + '<div class="checkbox">'
            + '<label>'
            + '<input type="hidden" name="contact_no_email" value="0" />'
            + '<input id="contact_no_email" type="checkbox" name="contact_no_email" value="1" />'
            + '<span>No Email</span>'
            + '</label>'
            + '</div>'
            + '<div class="form-group">'
            + '<label for="phone_mobile">Mobile Phone</label>'
            + '<input value="' + aData.contact_phone_mobile + '" type="text" class="form-control" id="phone_mobile" name="contact_phone_mobile" placeholder="Mobile Phone" />'
            + '</div>'
            + '<div class="checkbox">'
            + '<label>'
            + '<input type="hidden" name="contact_no_phone_call" value="0" />'
            + '<input id="contact_no_phone_call" type="checkbox" name="contact_no_phone_call" value="1" />'
            + '<span>No Phone Call</span>'
            + '</label>'
            + '</div>'

            + '</div>'

            + '<div class="col-md-6">'
            + '<div class="form-group">'
            + '<label for="phone_home">Home Phone</label>'
            + '<input value="' + aData.contact_phone_home + '" type="text" class="form-control" id="phone_home" name="contact_phone_home" placeholder="Home Phone" />'
            + '</div>'
            + '<div class="form-group">'
            + '<label for="country">Country</label>'
            + '<input value="' + aData.contact_country + '" type="text" class="form-control" id="country" name="contact_country" placeholder="Country" />'
            + '</div>'
            + '<div class="form-group">'
            + '<label for="state">State</label>'
            + '<input value="' + aData.contact_state + '" type="text" class="form-control" id="state" name="contact_state" placeholder="State" />'
            + '</div>'
            + '<div class="form-group">'
            + '<label for="city">City</label>'
            + '<input value="' + aData.contact_city + '" type="text" class="form-control" id="city" name="contact_city" placeholder="City" />'
            + '</div>'
            + '<div class="form-group">'
            + '<label for="street_line_1">Street Line 1</label>'
            + '<input value="' + aData.contact_line1 + '" type="text" class="form-control" id="street_line_1" name="contact_line1" placeholder="Street Line 1" />'
            + '</div>'
            + '<div class="form-group">'
            + '<label for="street_line_2">Street Line 2</label>'
            + '<input value="' + aData.contact_line2 + '" type="text" class="form-control" id="street_line_2" name="contact_line2" placeholder="Street Line 2" />'
            + '</div>'
            + '<div class="checkbox">'
            + '<label>'
            + '<input type="hidden" name="contact_iuaa_member" value="0" />'
            + '<input id="contact_iuaa_member" type="checkbox" name="contact_iuaa_member" value="1"/>'
            + '<span>IUAA Member?</span>'
            + '</label>'
            + '</div>'
            + '<div class="checkbox">'
            + '<label>'
            + '<input type="hidden" name="contact_share_with_iuaa" value="0" />'
            + '<input id="contact_share_with_iuaa" type="checkbox" name="contact_share_with_iuaa" value="1" />'
            + '<span>Share with IUAA?</span>'
            + '</label>'
            + '</div>'

            + '</div>'
            + '</div>'

            + '</form>';

    // insert form and title into modal
    $('#alum_study_field_public_modal .modal-title').text('Edit Scholarship');
    $('#alum_study_field_public_modal .modal-body').html(form);
    // check those of value 1
    var checkboxes = ['contact_no_email', 'contact_no_phone_call', 'contact_share_with_iuaa', 'contact_iuaa_member'];

    for(var i = 0; i < checkboxes.length; i++)
    {
        if(aData[checkboxes[i]])
        {
            $('#' + checkboxes[i]).prop('checked', true);
        }
    }
    $('#alum_study_field_public_modal').modal('toggle');
});


// can add page specific components here, such as a button to launch a modal containing charts.
window.customFunction = function () {
    console.log('this is a page specified custom function');

};


