


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


    var table_foot = '';

    var table_column_toggles = '<strong>Toggle Columns</strong>' +
            '<div id="column_toggles_div" class="btn-group" style="margin:10px 0;"></div>';

    // if child row, add an extra th in the beginning
    var column_toggle_index_offset = 0;
    if (window.dtChildRow)
    {
        table_html += '<th id="details_control_header"></th>';
        table_foot = '<th></th>';
        column_toggle_index_offset = 1;
    }

    var column_toggle_buttons = '';
    for(var i = 0; i < data.length; i++)
    {
        // generate table head columns
        var title = data[i].title;
        var th = '<th>' + title + '</th>';
        table_foot += '<th></th>';
        table_html += th;

        // generate column toggle buttons
        var column_index = i + column_toggle_index_offset;
        column_toggle_buttons += '<button type="button" class="toggle-vis btn btn-default" data-column="' +
            column_index +
            '">' +
            title +
            '</button>';
    }

    // add a restore-all-column button
    column_toggle_buttons += '<button id="restore_all_columns_button" type="button" class="btn btn-primary">Restore All Columns</button>';

    var column_edit = '<th class="sorting" ' +
        'tabindex="0" ' +
        'aria-controls="' + table_id + '" ' +
        'rowspan="1" ' +
        'colspan="1" ' +
        'aria-label="Edit: activate to sort column ascending" ' +
        'style="width: 20px;">Edit</th>';

    table_foot += '<th></th>';
    table_html +=  column_edit + '</tr></thead><tbody></tbody><tfoot><tr>' + table_foot + '</tr></tfoot></table>';

    $('#toggles_div_wrapper').html(table_column_toggles);
    $('#column_toggles_div').html(column_toggle_buttons);

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
    // if (window.dtChildRow)
    // {
    //     columns.splice(0, 0, window.dtChildRow );

    // }
    //draw table
    window.datatable = $('#' + table_id)
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
        ajax: window.location.pathname + '/data',
        columns: columns,
        order: window.dtOrder,
        columnDefs: window.dtColumnDefs,
        initComplete: function () {
            this.api().columns().every(function ()
            {
                // console.log(this.footer());
                var header = this.header();
                // console.log($(header).attr('id'));
                if ($(header).text() !== 'Edit' && $(header).attr('id') !== 'details_control_header')
                {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()))
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                }

            });

            if (window.customFunction)
            {
                window.customFunction();
            }

        }
    });

}

$( document ).ready(function() {

    window.fields_titles = [];
    // console.log($(location).attr('href'));
    // console.log(window.location.pathname);
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

            // for column filter, only fire after enter is pressed
            // $('.dataTable').dataTable().fnFilterOnReturn();

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
            // window.datatable.draw(false);
            // keep where user were after reload data from server
            window.datatable.ajax.reload(null, false);
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


    // insert form and title into modal
    $('#alum_study_field_public_modal .modal-title').text(window.modal.add.title);
    $('#alum_study_field_public_modal .modal-body').html(window.modal.add.form);
    $('#alum_study_field_public_modal').modal('toggle');
});



// function for showing child rows
// why details-control cannot receive click?
// no answer as for 20170904
// use double click on tr with role=row
$(document).on('dblclick', '#'+table_id+' tbody tr[role="row"]', function () {
    // if (window.dtChildRow)
    // {
        var tr = $(this).closest('tr');
        var row = window.datatable.row( tr );

        console.log(row.data());
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
    // }
    // else {
    //     console.log('child');
    // }
});

// toggle column display
$(document).on('click', 'button.toggle-vis', function (e) {
    e.preventDefault();
    var column = window.datatable.column($(this).attr('data-column'));
    console.log(column);
    column.visible(!column.visible());
    console.log(this);
    $(this).toggleClass('clicked').toggleClass('btn-default');

});


$(document).on('click', '#restore_all_columns_button', function(){
    var table = window.datatable;
    table.columns().visible(true);
    $('button.toggle-vis').removeClass('clicked').addClass('btn-default');
});


$(document).on('dblclick', 'h3.panel-title', function () {
    window.datatable.ajax.reload();
})