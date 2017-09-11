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

var attendance, total_num_contacts;
var contacts_array = [];


// function used for child row
function format ( d ) {

    console.log(d);
    contacts_array[d.id] = d.contacts;


    // `d` is the original data object for the row
    var num_contacts = d.contacts.length;
    attendance = num_contacts;
    total_num_contacts = d.num_active_contacts;



    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                    '<tr>'+
                        '<td><strong>Attendance:</strong></td>'+
                        '<td style="padding: 0 30px;"><a id="modal_launcher" href="#" data-row-id="' + d.id + '">' + num_contacts + '/' + total_num_contacts + '</a></td>' +
                    '</tr>'+
            '</table>';
}

var current_path = window.location.pathname;
/*
define form for add record modal
 */
var add_form = '<form action="' + current_path + '" method="post" id="create_form">'
    + '<div class="row">'
        + '<div class="col-md-6">'
            + '<div class="form-group">'
                + '<label for="event_name">Event Name</label>'
                + '<input type="text" class="form-control" id="event_name" name="event_name" placeholder="Event Name" />'
            + '</div>'
            + '<div class="form-group">'
                + '<label for="event_country">Country</label>'
                + '<input type="text" class="form-control" id="event_country" name="event_country" placeholder="country" />'
            + '</div>'
            + '<div class="form-group">'
                + '<label for="event_city">City</label>'
                + '<input type="text" class="form-control" id="event_city" name="event_city" placeholder="City" />'
            + '</div>'
        + '</div>'
        + '<div class="col-md-6">'
            + '<div class="form-group">'
                + '<label for="event_date">Date</label>'
                + '<input type="date" class="form-control" id="event_date" name="event_date" placeholder="Event Date" />'
            + '</div>'
            + '<div class="form-group">'
                + '<label for="event_state">State/Province</label>'
                + '<input type="email" class="form-control" id="event_state" name="event_state" placeholder="State/Province" />'
            + '</div>'
            + '<div class="form-group">'
                + '<label for="event_location">Location</label>'
                + '<input type="text" class="form-control" id="event_location" name="event_location" placeholder="Location" />'
            + '</div>'
        + '</div>'
    + '</div>'

    + '</form>';





window.modal= {
    add:{
        title: "Add Event"
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
        + '<label for="event_name">Event Name</label>'
        + '<input type="text" class="form-control" id="event_name" name="event_name" placeholder="Event Name" value="' + aData.event_name + '">'
        + '</div>'
        + '<div class="form-group">'
        + '<label for="event_country">Country</label>'
        + '<input type="text" class="form-control" id="event_country" name="event_country" placeholder="country" value="' + aData.event_country + '">'
        + '</div>'
        + '<div class="form-group">'
        + '<label for="event_city">City</label>'
        + '<input type="text" class="form-control" id="event_city" name="event_city" placeholder="City" value="' + aData.event_city + '">'
        + '</div>'
        + '</div>'
        + '<div class="col-md-6">'
        + '<div class="form-group">'
        + '<label for="event_date">Date</label>'
        + '<input type="date" class="form-control" id="event_date" name="event_date" placeholder="Event Date" value="' + aData.event_date + '">'
        + '</div>'
        + '<div class="form-group">'
        + '<label for="event_state">State/Province</label>'
        + '<input type="email" class="form-control" id="event_state" name="event_state" placeholder="State/Province" value="' + aData.event_state + '">'
        + '</div>'
        + '<div class="form-group">'
        + '<label for="event_location">Location</label>'
        + '<input type="text" class="form-control" id="event_location" name="event_location" placeholder="Location" value="' + aData.event_location + '">'
        + '</div>'
        + '</div>'
        + '</div>'
        + '</form>';

    // insert form and title into modal
    $('#alum_study_field_public_modal .modal-title').text('Edit Event');
    $('#alum_study_field_public_modal .modal-body').html(form);
    $('#alum_study_field_public_modal').modal('toggle');
});


$(document).on('click', '#modal_launcher',function () {

    var event_row_id = $(this).attr('data-row-id');

    console.log($(this));
    attendance = $(this).text().split('/')[0];
    total_num_contacts = $(this).text().split('/')[1];

    //prepare modal for visualizaton and attendees datatable
    var modal = '<div class="modal fade" id="visualization_event_attendance_modal" role="dialog">' +
                    '<div class="modal-dialog modal-lg" style="width: 90%;">' +
                        '<div class="modal-content">' +
                            '<div class="modal-header">' +
                                '<button type="button" class="close" data-dismiss="modal">&times;</button>' +
                                '<h3>Attendance</h3>' +
                            '</div>' +
                            '<div class="modal-body">' +
                                '<ul class="nav nav-tabs" style="margin-bottom: 15px;">' +
                                    '<li class="active">' +
                                        '<a href="#attendance_visualizations" data-toggle="tab">Charts</a>' +
                                    '</li>' +
                                    '<li>' +
                                        '<a href="#attendees" data-toggle="tab">Attendees</a>' +
                                    '</li>' +
                                '</ul>' +
                                '<div id="myTabContent" class="tab-content">' +
                                    '<div class="tab-pane fade active in" id="attendance_visualizations">' +
                                        '<div class="row">' +
                                            '<div class="col-md-12">' +
                                                    '<div id="attendance_pie_chart"></div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '<div class="tab-pane fade" id="attendees">' +
                                    '<table id="attendees_table" data-row-id="' + event_row_id + '">' +
                                        '<thead>' +
                                            '<tr>' +
                                                '<th>Salutation</th>' +
                                                '<th>First Name</th>' +
                                                '<th>Last Name</th>' +
                                                '<th>Email</th>' +
                                                '<th>Receive Email?</th>' +
                                                '<th>Age Group</th>' +
                                            '</tr>' +
                                        '</thead>'+
                                        '<tbody></tbody>'+
                                        '<tfoot>' +
                                            '<tr>' +
                                                '<th>Salutation</th>' +
                                                '<th>First Name</th>' +
                                                '<th>Last Name</th>' +
                                                '<th>Email</th>' +
                                                '<th>Receive Email?</th>' +
                                                '<th>Age Group</th>' +
                                            '</tr>' +
                                        '</tfoot>'+
                                    '</table>' +
                                '</div>' +
                            '</div>' +
                            // '</div>' +
                        '</div>' +
                    '</div>' +
                '</div>';

    $('#visualization_modal_container').html(modal);



    $('#visualization_event_attendance_modal').modal();


});


$(document).on('shown.bs.modal', '#visualization_event_attendance_modal', function (e) {
    // do something...
    var chart = c3.generate({
        bindto: '#attendance_pie_chart',
        data: {
            // iris data from R
            columns: [
                ['Attending', attendance],
                ['not Showing up', total_num_contacts - attendance]
            ],
            type : 'pie'
        }
        , tooltip: {
            format: {
                value: function (value, ratio, id, index) { return value; }
            }

        }

    });


    var row_id = $(this).find('table').data('rowId');
    var contacts = contacts_array[row_id];
    console.log(contacts);
    var attendees_table = $('#attendees_table')
        .DataTable({
            processing: true,
            pageLength: 25,
            search: {caseInsensitive: true},
            // serverSide: true,
            serverSide: false,
            // rowReorder: true,
            "dom": '<"m-t-10 pull-right"B><"m-t-10 pull-left"l><"m-t-10 pull-right"f>rt<"pull-left m-t-10"i><"m-t-10 pull-right"p>',
            buttons: [
                'copy', 'csv', 'pdf', 'print'
            ],
            data: contacts,
            columns: [
                {data: 'contact_salutation'},
                {data: 'contact_first_name'},
                {data: 'contact_last_name'},
                {data: 'contact_email'},
                {data: 'contact_no_email'},
                {data: 'contact_age_group'}
            ],
            scrollX: true,
            scrollY: '200px',
            scrollCollapse: true,
            paging: false,
            initComplete: function () {
                this.api().columns().every(function ()
                {
                    console.log(this.footer());
                    var header = this.header();
                    console.log($(header).attr('id'));
                    var column = this;
                    var br = document.createElement("br");
                    var input = document.createElement("input");
                    $(br).appendTo($(column.footer()));
                    $(input).appendTo($(column.footer()))
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });

                });

            }
        });

});