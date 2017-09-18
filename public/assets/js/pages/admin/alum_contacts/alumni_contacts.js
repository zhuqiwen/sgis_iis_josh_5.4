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

// window.dtOrder = [[1, 'asc']];




// function used for child row
function format ( d ) {

    console.log('window.datatable extra response data test');
    // console.log(window.datatable.ajax.json().age_group_frequency);
    // console.log(window.datatable.ajax.json().num_active_contacts);
    // `d` is the original data object for the row
    // var events = d.events;
    var events = '';
    for(var i = 0; i < d.events.length; i++)
    {
        events += '<p>';
        events += (i + 1) +'. ';
        events += '<strong>' + d.events[i].event_name + '</strong>';
        events += ' on ' + d.events[i].event_date;
        events += ' at ' + d.events[i].event_location;
        events += ' in ' + d.events[i].event_city;
        events += ', ' + d.events[i].event_state;
        events += ', ' + d.events[i].event_country;
        events += '</p>';
    }

    var employments = '';
    for(var i = 0; i < d.employments.length; i++)
    {
        employments += '<p>';
        employments += (i + 1) +'. ';
        employments += '<strong>' + d.employments[i].employment_job_title + '</strong>';
        employments += ' for <strong>' +
            '<a href="http://' + d.employments[i].employer.employer_url + '">' +
            d.employments[i].employer.employer +
            '</a>(' +
            d.employments[i].employer.employer_type.employer_type +
            ')</strong>';
        employments += ' since ' + d.employments[i].employment_start_date;
        if(d.employments[i].employment_end_date != null)
        {
            employments += ' till ' + d.employments[i].employment_end_date;
        }
        else
        {
            employments += ' till now';

        }
        employments += ' in ' + d.employments[i].employment_city;
        employments += ', ' + d.employments[i].employment_state;
        employments += ', ' + d.employments[i].employment_country;
        employments += '</p>';
    }

    var engagements = '';
    for(var i = 0; i < d.engagement_indicators.length; i++)
    {
        engagements += '<p>';
        engagements += (i + 1) +'. ';
        engagements += '<strong>' + d.engagement_indicators[i].engagement_indicator_name + '</strong>';
        engagements += '</p>';
    }

    var donations = '';
    for(var i = 0; i < d.donations.length; i++)
    {
        donations += '<p>';
        donations += (i + 1) + '. ';
        donations += 'on ' + '<strong>' + d.donations[i].donation_date + '</strong>';
        donations += ': ' + '<strong>' + d.donations[i].donation_amount + '</strong>';
        donations += ' in the form of ' + '<strong>' + d.donations[i].donation_form + '</strong>';
        donations += ', totaling ' + '<strong>' + d.donations[i].donation_sum + '</strong>';
        donations += '<p><strong>Note: </strong>' + d.donations[i].donation_note + '</p>';
        donations += '</p>';
    }

    var academics = '';
    for(var i = 0; i < d.academic_info.length; i++)
    {
        academics += '<p>';
        academics += '<p>' + (i + 1) + '. ';
        academics += 'Class: ' + '<strong>' + d.academic_info[i].academic_info_class_year + '</strong></p>';
        academics += '<p>Degree: ' + '<strong>' + d.academic_info[i].academic_info_degree + '</strong></p>';
        academics += '<p>Study Field: ' + '<strong>' + d.academic_info[i].study_field.study_field + '</strong></p>';
        academics += '</p>';
    }

    var social_media = '';
    for(var i = 0; i < d.social_accounts.length; i++)
    {
        social_media += '<p>';
        social_media += '<p>' + d.social_accounts[i].type + '</p>';
        social_media += '<p><strong>' + d.social_accounts[i].account + '</strong></p>';
        social_media += '</p>';
    }


    return '<div class="panel panel-primary">' +
                '<div class="panel-body">' +
                   '<div class="bs-example">' +
                        '<ul class="nav nav-tabs" style="margin-bottom: 15px;">' +
                            '<li class="active">' +
                                '<a href="#contact_' + d.id + '_employments" data-toggle="tab">Employments</a>' +
                            '</li>' +
                            '<li>' +
                                '<a href="#contact_' + d.id + '_engagements" data-toggle="tab">Engagements</a>' +
                            '</li>' +
                            '<li>' +
                                '<a href="#contact_' + d.id + '_events" data-toggle="tab">Events</a>' +
                            '</li>' +
                            '<li>' +
                                '<a href="#contact_' + d.id + '_donations" data-toggle="tab">Donations</a>' +
                            '</li>' +
                            '<li>' +
                                '<a href="#contact_' + d.id + '_academics" data-toggle="tab">Academic History</a>' +
                            '</li>' +
                            '<li>' +
                                '<a href="#contact_' + d.id + '_social_media" data-toggle="tab">Social Media</a>' +
                            '</li>' +
                        '</ul>' +
                    '<div id="myTabContent" class="tab-content">' +
                        '<div class="tab-pane fade active in" id="contact_' + d.id + '_employments">' +
                            '<p  class="m-r-6">' +
                                employments +
                            '</p>' +
                        '</div>' +
                        '<div class="tab-pane fade" id="contact_' + d.id + '_engagements">' +
                            '<p class="m-r-6">' +
                                engagements +
                            '</p>' +
                        '</div>' +
                        '<div class="tab-pane fade" id="contact_' + d.id + '_events">' +
                            '<p class="m-r-6">' +
                                events +
                            '</p>' +
                        '</div>' +
                        '<div class="tab-pane fade" id="contact_' + d.id + '_donations">' +
                            '<p class="m-r-6">' +
                                donations +
                            '</p>' +
                        '</div>' +
                        '<div class="tab-pane fade" id="contact_' + d.id + '_academics">' +
                            '<p class="m-r-6">' +
                                academics +
                            '</p>' +
                        '</div>' +
                        '<div class="tab-pane fade" id="contact_' + d.id + '_social_media">' +
                            '<p class="m-r-6">' +
                                social_media +
                            '</p>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
}


var current_path = window.location.pathname;

/*
define form for add record modal
 */
var add_form = '<form action="' + current_path + '" method="post" id="create_form">'
    + '<div class="row">'
    + '<div class="col-md-6">'
    + '<div class="form-group">'
    + '<label for="salutation">Salutation</label>'
    + '<input type="text" class="form-control" id="salutation" name="contact_salutation" placeholder="Salutation" />'
    + '</div>'
    + '<div class="form-group">'
    + '<label for="first_name">First Name</label>'
    + '<input type="text" class="form-control" id="first_name" name="contact_first_name" placeholder="First Name" />'
    + '</div>'
    + '<div class="form-group">'
    + '<label for="middle_name">Middle Name</label>'
    + '<input type="text" class="form-control" id="middle_name" name="contact_middle_name" placeholder="Middle Name" />'
    + '</div>'
    + '<div class="form-group">'
    + '<label for="last_name">Last Name</label>'
    + '<input type="text" class="form-control" id="last_name" name="contact_last_name" placeholder="Last Name" />'
    + '</div>'
    + '<div class="form-group">'
    + '<label for="email">Email</label>'
    + '<input type="email" class="form-control" id="email" name="contact_email" placeholder="Email" />'
    + '</div>'
    + '<div class="checkbox">'
    + '<label>'
    + '<input type="hidden" name="contact_no_email" value="0" />'
    + '<input type="checkbox" name="contact_no_email" value="1" />'
    + '<span>No Email</span>'
    + '</label>'
    + '</div>'
    + '<div class="form-group">'
    + '<label for="phone_mobile">Mobile Phone</label>'
    + '<input type="text" class="form-control" id="phone_mobile" name="contact_phone_mobile" placeholder="Mobile Phone" />'
    + '</div>'
    + '<div class="checkbox">'
    + '<label>'
    + '<input type="hidden" name="contact_no_phone_call" value="0" />'
    + '<input type="checkbox" name="contact_no_phone_call" value="1" />'
    + '<span>No Phone Call</span>'
    + '</label>'
    + '</div>'

    + '</div>'

    + '<div class="col-md-6">'
    + '<div class="form-group">'
    + '<label for="phone_home">Home Phone</label>'
    + '<input type="text" class="form-control" id="phone_home" name="contact_phone_home" placeholder="Home Phone" />'
    + '</div>'
    + '<div class="form-group">'
    + '<label for="country">Country</label>'
    + '<input type="text" class="form-control" id="country" name="contact_country" placeholder="Country" />'
    + '</div>'
    + '<div class="form-group">'
    + '<label for="state">State</label>'
    + '<input type="text" class="form-control" id="state" name="contact_state" placeholder="State" />'
    + '</div>'
    + '<div class="form-group">'
    + '<label for="city">City</label>'
    + '<input type="text" class="form-control" id="city" name="contact_city" placeholder="City" />'
    + '</div>'
    + '<div class="form-group">'
    + '<label for="street_line_1">Street Line 1</label>'
    + '<input type="text" class="form-control" id="street_line_1" name="contact_line1" placeholder="Street Line 1" />'
    + '</div>'
    + '<div class="form-group">'
    + '<label for="street_line_2">Street Line 2</label>'
    + '<input type="text" class="form-control" id="street_line_2" name="contact_line2" placeholder="Street Line 2" />'
    + '</div>'
    + '<div class="checkbox">'
    + '<label>'
    + '<input type="hidden" name="contact_iuaa_member" value="0" />'
    + '<input type="checkbox" name="contact_iuaa_member" value="1" />'
    + '<span>IUAA Member?</span>'
    + '</label>'
    + '</div>'
    + '<div class="checkbox">'
    + '<label>'
    + '<input type="hidden" name="contact_share_with_iuaa" value="0" />'
    + '<input type="checkbox" name="contact_share_with_iuaa" value="1" />'
    + '<span>Share with IUAA?</span>'
    + '</label>'
    + '</div>'

    + '</div>'
    + '</div>'

    + '</form>';





window.modal= {
    add:{
        title: "Add Study Field"
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
    $('#alum_study_field_public_modal .modal-title').text('Edit Contact');
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
    // add button of visualization report
    var visualization_button = '<button style="margin-left: 10px;" id="charts_launcher_button" type="button" class="btn btn-responsive button-alignment btn-primary">Charts</button>';
    $('#add_button').after(visualization_button);

    // add modal of charts
    var modal = '<div class="modal fade" id="visualization_contacts_modal" role="dialog">' +
                    '<div class="modal-dialog modal-lg" style="width: 90%;">' +
                        '<div class="modal-content">' +
                            '<div class="modal-header">' +
                                '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
                                '<h3>Alumni in General</h3>' +
                            '</div>' +
                            '<div class="modal-body">' +
                                '<ul class="nav nav-tabs" style="margin-bottom: 15px;">' +
                                    '<li class="active">' +
                                        '<a href="#age_groups_visualizations" data-toggle="tab">Age Groups</a>' +
                                    '</li>' +
                                '</ul>' +
                                '<div id="myTabContent" class="tab-content">' +
                                    '<div class="tab-pane fade active in" id="age_groups_visualizations">' +
                                        '<div class="row">' +
                                            '<div class="col-md-12">' +
                                                '<div id="age_groups_pie_chart"></div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>';

    $('#visualization_modal_container').html(modal);





};


$(document).on('click', '#charts_launcher_button', function () {

    var data = window.datatable.ajax.json().age_group_frequency;

    var age_groups = Object.keys(data);
    var age_group_frequency = [];
    for (var i = 0; i < age_groups.length; i++)
    {
        var k = age_groups[i];
        var v = data[k];
        var pair = [k, v];
        age_group_frequency.push(pair);
    }

    console.log(age_group_frequency);

    var chart = c3.generate({
        bindto: '#age_groups_pie_chart',
        data: {
            columns: age_group_frequency,
            type : 'pie'
        }
        , tooltip: {
            format: {
                value: function (value, ratio, id, index) { return value; }
            }

        }

    });


    $('#visualization_contacts_modal').modal();

});