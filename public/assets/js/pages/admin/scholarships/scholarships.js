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

window.dtOrder = [[1, 'asc']];




// function used for child row
function format ( d ) {
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
        // '<p>Basics</p>' +
            '<div class="col-md-12">' +
                //introduction
                '<div class="row">' +
                    '<div class="col-md-12">' +
                        '<div class="form-group">' +
                            '<label for="scholarship_introduction">Scholarship Introduction</label>' +
                            '<textarea class="form-control" id="scholarship_introduction" rows="3" name="scholarship_introduction" placeholder="Introduction"></textarea>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
                //award amount and deadline
                '<div class="row">' +
                    //award amoun
                    '<div class="col-md-6">' +
                        '<div class="form-group">' +
                            '<label for="scholarship_award_amount">Award Amount</label>' +
                            '<input type="text"  class="form-control" id="scholarship_award_amount" name="scholarship_award_amount" placeholder="Award Amount" />' +
                        '</div>' +
                    '</div>' +
                    //deadline
                    '<div class="col-md-6">' +
                        '<div class="form-group">' +
                            '<label for="scholarship_deadline">Application Deadline</label>' +
                            '<input type="date" class="form-control" id="scholarship_deadline" name="scholarship_deadline" />' +
                        '</div>' +
                    '</div>' +
                '</div>' +
                //donar
                '<div class="row">' +
                    '<div class="col-md-12">' +
                        '<div class="form-group">' +
                            '<label for="scholarship_about_donar">About Donar</label>' +
                            '<textarea class="form-control" id="scholarship_about_donar" name="scholarship_about_donar" placeholder="About Donar"></textarea>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
                //notes
                '<div class="row">' +
                    '<div class="col-md-12">' +
                        '<div class="form-group">' +
                            '<label for="scholarship_notes">Scholarship Note, if any </label>' +
                            '<textarea class="form-control" id="scholarship_notes" name="scholarship_notes" placeholder="Scholarship note, if any"></textarea>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</div>' +
        '</div>' +
        //criteria

        '<hr>' +
        // '<p>Criteria</p>' +
        '<div class="row">' +
            '<div class="col-md-12">' +
                '<div class="form-group">' +
                    '<label for="criteria_content">Criteria</label>' +
                    '<textarea class="form-control" id="criteria_content" name="criteria_content" placeholder="Selection Criteria, if any"></textarea>' +
                '</div>' +
            '</div>' +
        '</div>' +
        //eligibility
        '<hr>' +
        // '<p>Eligibility</p>' +
        '<div class="row">' +
                '<div id="eligibility" class="form-group">' +
                    '<div class="col-md-5">' +
                        '<label>How many items of eligibility?</label>' +
                    '</div>' +
                    '<div class="col-md-3">' +
                        '<input type="number" class="form-control" min="0" value="1"></input>' +
                    '</div>' +
                    '<div class="col-md-2">' +
                        '<button class="btn btn-primary generate_inputs">Generate</button>' +
                    '</div>' +
                    '<div class="col-md-2" hidden>' +
                        '<button class="btn btn-primary destroy_inputs" hidden>Reset</button>' +
                    '</div>' +
                '</div>' +
        '</div>' +
        //material
        '<hr>' +
        // '<p>Application Materials</p>' +
        '<div class="row">' +
            '<div id="material" class="form-group">' +
            '<div class="col-md-5">' +
            '<label>How many items of materials?</label>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<input type="number" class="form-control" min="0" value="1"></input>' +
            '</div>' +
            '<div class="col-md-2">' +
            '<button class="btn btn-primary generate_inputs">Generate</button>' +
            '</div>' +
            '<div class="col-md-2" hidden>' +
            '<button class="btn btn-primary destroy_inputs" hidden>Reset</button>' +
            '</div>' +
            '</div>' +
        '</div>' +
        //process
        '<hr>' +
        // '<p>Apply steps</p>' +
        '<div class="row">' +
            '<div id="process" class="form-group">' +
            '<div class="col-md-5">' +
            '<label>How many steps</label>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<input type="number" class="form-control" min="0" value="1"></input>' +
            '</div>' +
            '<div class="col-md-2">' +
            '<button class="btn btn-primary generate_inputs">Generate</button>' +
            '</div>' +
            '<div class="col-md-2" hidden>' +
            '<button class="btn btn-primary destroy_inputs" hidden>Reset</button>' +
            '</div>' +
            '</div>' +
        '</div>' +
        //requirement
        '<hr>' +
        // '<p>Requirements</p>' +
        '<div class="row">' +
            '<div id="requirement" class="form-group">' +
            '<div class="col-md-5">' +
            '<label>How many requirements?</label>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<input type="number" class="form-control" min="0" value="1"></input>' +
            '</div>' +
            '<div class="col-md-2">' +
            '<button class="btn btn-primary generate_inputs">Generate</button>' +
            '</div>' +
            '<div class="col-md-2" hidden>' +
            '<button class="btn btn-primary destroy_inputs" hidden>Reset</button>' +
            '</div>' +
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

    console.log(aData);

    // construct form and fill form with row data
    var form = '<form action="' + current_path + '/' + aData.id + '" method="put" id="' + form_id + '">' +
        '<div class="container-fluid">' +
        //scholarship basic
        '<div class="row">' +
        '<div class="col-md-12">' +
        //introduction
        '<div class="row">' +
        '<div class="col-md-12">' +
        '<div class="form-group">' +
        '<label for="scholarship_introduction">Scholarship Introduction</label>' +
        '<textarea class="form-control" id="scholarship_introduction" rows="3" name="scholarship_introduction" placeholder="Introduction">' + aData.scholarship_introduction + '</textarea>' +
        '</div>' +
        '</div>' +
        '</div>' +
        //award amount and deadline
        '<div class="row">' +
        //award amoun
        '<div class="col-md-6">' +
        '<div class="form-group">' +
        '<label for="scholarship_award_amount">Award Amount</label>' +
        '<input type="text"  class="form-control" id="scholarship_award_amount" name="scholarship_award_amount" placeholder="Award Amount">' + aData.scholarship_award_amount + '</input>' +
        '</div>' +
        '</div>' +
        //deadline
        '<div class="col-md-6">' +
        '<div class="form-group">' +
        '<label for="scholarship_deadline">Application Deadline</label>' +
        '<input type="date" class="form-control" id="scholarship_deadline" name="scholarship_deadline">' + aData.scholarship_deadline + '</input>' +
        '</div>' +
        '</div>' +
        '</div>' +
        //donar
        '<div class="row">' +
        '<div class="col-md-12">' +
        '<div class="form-group">' +
        '<label for="scholarship_about_donar">About Donar</label>' +
        '<textarea class="form-control" id="scholarship_about_donar" name="scholarship_about_donar" placeholder="About Donar">' + aData.scholarship_about_donar + '</textarea>' +
        '</div>' +
        '</div>' +
        '</div>' +
        //notes
        '<div class="row">' +
        '<div class="col-md-12">' +
        '<div class="form-group">' +
        '<label for="scholarship_notes">Scholarship Note, if any </label>' +
        '<textarea class="form-control" id="scholarship_notes" name="scholarship_notes" placeholder="Scholarship note, if any">' + aData.scholarship_notes + '</textarea>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        //criteria

        '<hr>' +
        // '<p>Criteria</p>' +
        '<div class="row">' +
        '<div class="col-md-12">' +
        '<div class="form-group">' +
        '<label for="criteria_content">Criteria</label>' +
        '<input type="hidden" name="criteria_id" value="' + aData.criteria.id + '" />' +
        '<textarea class="form-control" id="criteria_content" name="criteria_content" placeholder="Selection Criteria, if any">' + aData.criteria.criteria_content + '</textarea>' +
        '</div>' +
        '</div>' +
        '</div>' +
        //eligibility
        '<hr>' +
        // '<p>Eligibility</p>' +
        '<div class="row">' +
        '<div id="eligibility" class="form-group">' +
        '<div class="col-md-5">' +
        '<label>How many items of eligibility?</label>' +
        '</div>' +
        '<div class="col-md-3">' +
        '<input type="number" class="form-control" min="0" value="1"></input>' +
        '</div>' +
        '<div class="col-md-2">' +
        '<button class="btn btn-primary generate_inputs">Generate</button>' +
        '</div>' +
        '<div class="col-md-2" hidden>' +
        '<button class="btn btn-primary destroy_inputs" hidden>Reset</button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        //material
        '<hr>' +
        // '<p>Application Materials</p>' +
        '<div class="row">' +
        '<div id="material" class="form-group">' +
        '<div class="col-md-5">' +
        '<label>How many items of materials?</label>' +
        '</div>' +
        '<div class="col-md-3">' +
        '<input type="number" class="form-control" min="0" value="1"></input>' +
        '</div>' +
        '<div class="col-md-2">' +
        '<button class="btn btn-primary generate_inputs">Generate</button>' +
        '</div>' +
        '<div class="col-md-2" hidden>' +
        '<button class="btn btn-primary destroy_inputs" hidden>Reset</button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        //process
        '<hr>' +
        // '<p>Apply steps</p>' +
        '<div class="row">' +
        '<div id="process" class="form-group">' +
        '<div class="col-md-5">' +
        '<label>How many steps</label>' +
        '</div>' +
        '<div class="col-md-3">' +
        '<input type="number" class="form-control" min="0" value="1"></input>' +
        '</div>' +
        '<div class="col-md-2">' +
        '<button class="btn btn-primary generate_inputs">Generate</button>' +
        '</div>' +
        '<div class="col-md-2" hidden>' +
        '<button class="btn btn-primary destroy_inputs" hidden>Reset</button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        //requirement
        '<hr>' +
        // '<p>Requirements</p>' +
        '<div class="row">' +
        '<div id="requirement" class="form-group">' +
        '<div class="col-md-5">' +
        '<label>How many requirements?</label>' +
        '</div>' +
        '<div class="col-md-3">' +
        '<input type="number" class="form-control" min="0" value="1"></input>' +
        '</div>' +
        '<div class="col-md-2">' +
        '<button class="btn btn-primary generate_inputs">Generate</button>' +
        '</div>' +
        '<div class="col-md-2" hidden>' +
        '<button class="btn btn-primary destroy_inputs" hidden>Reset</button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</form>';

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


$(document).on('click', '.generate_inputs', function (e) {
    e.preventDefault();
    var num_items = $(this).parent().siblings().children('input').val();
    var group_name = $(this).parent().parent().attr('id');
    var group_div = $(this).parent().parent();
    var items = '<div class="appended_div">';
    for (var i = 0; i < num_items; i ++)
    {
        items += '<div class="col-md-12">';
        items += '<label>' + group_name + ' ' + (i + 1) + '</label>';
        items += '<input type="hidden" name="' + group_name + '_order[]" value="' + i + '" />';
        items += '<input type="text" class="form-control" name="' + group_name + '_item[]" />';
        items += '</div>';
    }
    items += '</div>';
    group_div.append(items);
    $(this).parent().toggle();
    $(this).parent().siblings().children('.destroy_inputs').parent().toggle();

});

$(document).on('click', '.destroy_inputs', function (e) {
    e.preventDefault();
    var appended_div = $(this).parent().siblings().last();
    appended_div.remove();
    $(this).parent().toggle();
    $(this).parent().siblings().children('.generate_inputs').parent().toggle();
});
