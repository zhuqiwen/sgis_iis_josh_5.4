$( document ).ready(function() {
    $(function () {
        var nEditing = null;
        window.table = $('#sample_editable_1').DataTable({
            processing: true,
            serverSide: true,
            rowReorder: true,
            "dom": '<"m-t-10 pull-right"B><"m-t-10 pull-left"l><"m-t-10 pull-right"f>rt<"pull-left m-t-10"i><"m-t-10 pull-right"p>',
            buttons: [
                'copy', 'csv', 'pdf', 'print'
            ],
            ajax: 'alum_study_fields/data',
            columns: [
            {data: 'id', name: 'id'},
            {data: 'study_field', name: 'study_field'},
            {data: 'edit', name: 'edit', orderable: false, searchable: false}
            // {data: 'delete', name: 'delete', orderable: false, searchable: false}
        ]
    });


        // table.on('draw', function () {
        //     $('.livicon').each(function () {
        //         $(this).updateLivicon();
        //     });
        // });
        //
        function restoreRow(table, nRow) {
            var aData = table.row(nRow).data();
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                table.cell().data(aData[i], nRow, i, false);
            }
            table.draw(false);
        }

        /*
         Cancel Edit functionality
         */

        function cancelEditRow(table, nRow) {
            var aData = table.row(nRow).data();
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                table.cell().data(aData[i], nRow, i, false);
            }

            table.draw(false);
        }
        //
        // /*
        //  Edit functionality
        //  */
        //
        var row_id,study_field;

        function editRow(table, nRow) {
            var aData = table.row(nRow).data();
            console.log(aData);
            var jqTds = $('>td', nRow);
            row_id = aData.id ? aData.id : '';
            study_field = aData.study_field ? aData.study_field : '';



            jqTds[0].innerHTML = row_id;
            jqTds[1].innerHTML = '<input type="text" name="study_field" id="study_field" class="form-control input-large" value="' + study_field + '">';
            jqTds[2].innerHTML = '<a class="edit" href="">Save</a>';
            jqTds[3].innerHTML = '<a class="cancel" href="">Cancel</a>';
        }

        function saveRow(table, nRow) {
            var jqInputs = $('input', nRow);
            study_field = jqInputs[0].value;


            //any better way to serialize the data?
            var tableData = 'study_field=' + encodeURIComponent(study_field)  + '&_token=' + $('meta[name=_token]').attr('content');

            $.ajax({
                // type: "post",
                type: "put",
                // url: 'editable_datatables/' + row_id + '/update',
                url: 'admin/alum_study_fields/' + row_id,
                data: tableData,
                success: function (result) {
                    if(result!='success') {
                        swal("There is some error!", result);
                        editRow(table, nRow);
                        nEditing = nRow;
                    }
                    else {
                        table.draw(false);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    var e = window.open();
                    e.document.write(xhr.responseText);
                }
            });

        }




        /*
         When clicked on edit button
         */

        table.on('click', '.edit', function (e) {
            e.preventDefault();

            var form_id = 'edit_form';
            // change modal submit button attribute
            $('#public_modal_submit_button')
                .addClass('btn-danger')
                .attr('form', form_id)
                .text('Update');
            // get row data
            var nRow = $(this).parents('tr')[0];
            var aData = table.row(nRow).data();

            // construct form and fill form with row data
            var form = '<form action="/admin/alum_study_fields/' + aData.id + '" method="put" id="' + form_id + '">'
                    + '<label for="study_field">Study Field</label>'
                    + '<input class="form-control" type="text" id="study_field" name="study_field" value="' + aData.study_field + '"></input>'
                    + '</form>';

            // insert form and title into modal
            $('#alum_study_field_public_modal .modal-title').text('Edit Study Field');
            $('#alum_study_field_public_modal .modal-body').html(form);
            $('#alum_study_field_public_modal').modal('toggle');




            // /* Get the row as a parent of the link that was clicked on */
            // var nRow = $(this).parents('tr')[0];
            // console.log(nRow);
            // if (nEditing !== null && nEditing != nRow) {
            //     /* Currently editing - but not this row - restore the old before continuing to edit mode */
            //     $('#editConfirmModal').modal();
            //
            // } else if (nEditing == nRow && this.innerHTML == "Save") {
            //     /* Editing this row and want to save it */
            //     saveRow(table, nEditing);
            //     nEditing = null;
            //
            // } else {
            //     /* No edit in progress - let's start one */
            //     editRow(table, nRow);
            //     nEditing = nRow;
            // }
        });
    });
    // setTimeout(function(){
    //     // $('input[type=search], th, #sample_editable_1_length select').on('mousedown',function(){
    //     //     $('.cancel').click();
    //     // });
    //     // $('#sample_editable_1').on( 'page.dt', function () {
    //     //     $('.cancel').click();
    //     // } );
    // },10);







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
            window.table.draw(false);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            var e = window.open();
            e.document.write(xhr.responseText);
        }
    });
});

$(document).on('click', '#add_study_field', function () {
    var form_id = 'create_form';
    // change modal submit button attribute
    $('#public_modal_submit_button')
        .addClass('btn-primary')
        .attr('form', form_id)
        .text('Add');

    // construct form and fill form with row data
    var form = '<form action="/admin/alum_study_fields" method="post" id="' + form_id + '">'
        + '<label for="study_field">Study Field</label>'
        + '<input class="form-control" type="text" id="study_field" name="study_field"></input>'
        + '</form>';

    // insert form and title into modal
    $('#alum_study_field_public_modal .modal-title').text('Add A Study Field');
    $('#alum_study_field_public_modal .modal-body').html(form);
    $('#alum_study_field_public_modal').modal('toggle');
});
