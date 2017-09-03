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
        columnDefs: window.dtColumnDefs
    });
}

$( document ).ready(function() {
    console.log($(location).attr('href'));
    console.log(window.location.pathname);
    // var columnsDT;
    $.ajax({
        type: 'get',
        url: window.location.pathname + '/getColumns',
        data:{},
        dataType: 'json',
        success: function (returned_data) {
            console.log(returned_data);

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
