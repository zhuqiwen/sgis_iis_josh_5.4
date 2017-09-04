


var table_id = 'alum_datatable';





function insertDatatablesTableHead(data) {
    //construct table
    var table_html = '<table class="' +
        'table ' +
        'table-striped ' +
        'table-bordered ' +
        'table-hover ' +
        'dataTable ' +
        'no-footer ' +
        'sample_editable"' +
        ' id="' + table_id + '" role="grid">' +
            '<thead>' +
                '<tr role="row">';


    // if child row, add an extra th in the beginning
    if (window.dtChildRow)
    {
        table_html += '<th></th>';
    }

    for(var i = 0; i < data.length; i++)
    {
        var title = data[i].title;
        var th = '<th class="sorting_asc" ' +
            'tabindex="0" ' +
            'aria-controls="' + table_id + '" ' +
            'rowspan="1" ' +
            'colspan="1">' +
                title +
                '</th>';
        table_html += th;
    }

    var column_edit = '<th class="sorting" ' +
        'tabindex="0" ' +
        'aria-controls="' + table_id + '" ' +
        'rowspan="1" ' +
        'colspan="1" ' +
        'aria-label="Edit: activate to sort column ascending" ' +
        'style="width: 20px;">Edit</th>';
    table_html += column_edit + '</th></tr></thead><tbody></tbody></table>';

    //insert table into target div
    $('#responsive_table_div').html(table_html);
}

function drawTable(data) {
    var columns = [];
    for(var i = 0; i < data.length; i++)
    {
        columns.push(data[i].column);
    }
    // don't forget edit button
    columns.push({data: 'edit', name: 'edit', orderable: false, searchable: false});


    // //if any extra column definition
    if (window.dtChildRow)
    {
        columns.splice(0, 0, window.dtChildRow );

    }
    //draw table
    window.datatable = $('#' + table_id)
        .DataTable({
        processing: true,
        serverSide: true,
        rowReorder: true,
        "dom": '<"m-t-10 pull-right"B><"m-t-10 pull-left"l><"m-t-10 pull-right"f>rt<"pull-left m-t-10"i><"m-t-10 pull-right"p>',
        buttons: [
            'copy', 'csv', 'pdf', 'print'
        ],
        ajax: window.location.pathname + '/data',
        columns: columns,
        order: window.dtOrder,
        columnDefs: window.dtColumnDefs
    });
}

$( document ).ready(function() {
    window.fields_titles = [];
    console.log($(location).attr('href'));
    console.log(window.location.pathname);
    // var columnsDT;
    $.ajax({
        type: 'get',
        url: window.location.pathname + '/getColumns',
        data:{},
        dataType: 'json',
        success: function (returned_data) {
            window.fields_titles = returned_data;

            insertDatatablesTableHead(returned_data);
            drawTable(returned_data);

        },
        error: function (xhr, ajaxOptions, thrownError) {
            var e = window.open();
            e.document.write(xhr.responseText);
        }
    });
});

$(document).on('click', '#public_modal_submit_button', function (e) {
    e.preventDefault();


    var form = $(this.form);
    console.log(form.attr('action'));
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        success: function (returned_data) {
            console.log(returned_data);
            window.datatable.draw(false);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            var e = window.open();
            e.document.write(xhr.responseText);
        }
    });
});


$(document).on('click', '#add_button', function () {
    // change modal submit button attribute
    $('#public_modal_submit_button')
        .addClass('btn-primary')
        .attr('form', 'create_form')
        .text('Add');

    // construct form and fill form with row data
    // var form = '<form action="/admin/alum_study_fields" method="post" id="' + form_id + '">'
    //     + '<label for="study_field">Study Field</label>'
    //     + '<input class="form-control" type="text" id="study_field" name="study_field"></input>'
    //     + '</form>';

    // insert form and title into modal
    $('#alum_study_field_public_modal .modal-title').text(window.modal.add.title);
    $('#alum_study_field_public_modal .modal-body').html(window.modal.add.form);
    $('#alum_study_field_public_modal').modal('toggle');
});



// function for showing child rows
// why details-control cannot receive click?
// $(document).on('click', 'td.details-control', function () {
$(document).on('click', 'td', function () {

    if (window.dtChildRow)
    {
        var tr = $(this).closest('tr');
        var row = window.datatable.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    }
    else {
        return;
    }
});
