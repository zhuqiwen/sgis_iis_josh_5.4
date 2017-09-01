$( document ).ready(function() {
    $(function () {
        var nEditing = null;
        var table = $('#sample_editable_1').DataTable({
            processing: true,
            serverSide: true,
            rowReorder: true,
            ajax: 'alum_study_fields/data',
            columns: [
            {data: 'id', name: 'id'},
            {data: 'study_field', name: 'study_field'},
            {data: 'edit', name: 'edit', orderable: false, searchable: false},
            {data: 'delete', name: 'delete', orderable: false, searchable: false}
        ]
    });
        // table.on('draw', function () {
        //     $('.livicon').each(function () {
        //         $(this).updateLivicon();
        //     });
        // });
        //
        // function restoreRow(table, nRow) {
        //     var aData = table.row(nRow).data();
        //     var jqTds = $('>td', nRow);
        //
        //     for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
        //         table.cell().data(aData[i], nRow, i, false);
        //     }
        //     table.draw(false);
        // }
        //
        // /*
        //  Edit functionality
        //  */
        //
        // var row_id,firstname, lastname, points, notes;
        //
        // function editRow(table, nRow) {
        //     var aData = table.row(nRow).data();
        //     var jqTds = $('>td', nRow);
        //     row_id = aData.id ? aData.id : '';
        //     firstname = aData.firstname ? aData.firstname : '';
        //     lastname = aData.lastname ? aData.lastname : '';
        //     points = aData.points ? aData.points : '';
        //     notes = aData.notes ? aData.notes : '';
        //
        //
        //     jqTds[0].innerHTML = row_id;
        //     jqTds[1].innerHTML = '<input type="text" name="firstname" id="firstname" class="form-control input-small" value="' + firstname + '">';
        //     jqTds[2].innerHTML = '<input type="text" name="lastname" id="lastname" class="form-control input-small" value="' + lastname + '">';
        //     jqTds[3].innerHTML = '<input type="text" name="points" id="points" class="form-control input-small" value="' + points + '">';
        //     jqTds[4].innerHTML = '<input type="text" name="notes" id="notes" class="form-control input-small" value="' + notes + '">';
        //     jqTds[5].innerHTML = '<a class="edit" href="">Save</a>';
        //     jqTds[6].innerHTML = '<a class="cancel" href="">Cancel</a>';
        // }
        //
        // function saveRow(table, nRow) {
        //     var jqInputs = $('input', nRow);
        //     firstname = jqInputs[0].value;
        //     lastname = jqInputs[1].value;
        //     points = jqInputs[2].value;
        //     notes = jqInputs[3].value;
        //
        //     var tableData = 'firstname=' + encodeURIComponent(firstname) + '&lastname=' + encodeURIComponent(lastname) +
        //         '&points=' + encodeURIComponent(points) + '&notes=' + encodeURIComponent(notes) + '&_token=' + $('meta[name=_token]').attr('content');
        //
        //     $.ajax({
        //         type: "post",
        //         url: 'editable_datatables/' + row_id + '/update',
        //         data: tableData,
        //         success: function (result) {
        //             if(result!='success') {
        //                 swal("There is some error!", result);
        //                 editRow(table, nRow);
        //                 nEditing = nRow;
        //             }
        //             else {
        //                 table.draw(false);
        //             }
        //         },
        //         error: function (result) {
        //             console.log(result)
        //         }
        //     });
        //
        // }

        /*
         Cancel Edit functionality
         */

        // function cancelEditRow(table, nRow) {
        //     var aData = table.row(nRow).data();
        //     var jqTds = $('>td', nRow);
        //
        //     for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
        //         table.cell().data(aData[i], nRow, i, false);
        //     }
        //
        //     table.draw(false);
        // }

        /*
         Delete Functionality
         */
        // var nRow, aData, id;
        // table.on('click', '.delete', function (e) {
        //     e.preventDefault();
        //     nRow = $(this).parents('tr')[0];
        //     aData = table.row(nRow).data();
        //     if (nEditing !== null && nEditing != nRow) {
        //         /* Currently editing - but not this row - restore the old before continuing to edit mode */
        //         $('#editConfirmModal').modal();
        //         $('#deleteConfirmModal').modal().hide();
        //     }
        //     else {
        //         id = aData.id;
        //         $('#deleteConfirmModal').on('click', '#delete_item', function (e) {
        //             $.ajax({
        //                 type: "get",
        //                 url: 'editable_datatables/' + id + '/delete',
        //                 success: function (result) {
        //                     console.log('row ' + result + ' deleted');
        //                     table.draw(false);
        //                 },
        //                 error: function (result) {
        //                     console.log(result)
        //                 }
        //             });
        //         });
        //     }
        // });
        //
        // /*
        //  When clicked on cancel button
        //  */
        // table.on('click', '.cancel', function (e) {
        //     e.preventDefault();
        //
        //     restoreRow(table, nEditing);
        //     nEditing = null;
        //
        // });

        /*
         When clicked on edit button
         */

        // table.on('click', '.edit', function (e) {
        //     e.preventDefault();
        //
        //     /* Get the row as a parent of the link that was clicked on */
        //     var nRow = $(this).parents('tr')[0];
        //     if (nEditing !== null && nEditing != nRow) {
        //         /* Currently editing - but not this row - restore the old before continuing to edit mode */
        //         $('#editConfirmModal').modal();
        //
        //     } else if (nEditing == nRow && this.innerHTML == "Save") {
        //         /* Editing this row and want to save it */
        //         saveRow(table, nEditing);
        //         nEditing = null;
        //
        //     } else {
        //         /* No edit in progress - let's start one */
        //         editRow(table, nRow);
        //         nEditing = nRow;
        //     }
        // });
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