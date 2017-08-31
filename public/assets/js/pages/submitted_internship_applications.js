// $("[data-toggle='popover']").popover();
//
// $('.po-markup > .po-link').popover({
//     html: true, // must have if HTML is contained in popover
//
//     // get the title and conent
//     title: function() {
//         return $(this).parent().find('.po-title').html();
//     },
//     content: function() {
//         return $(this).parent().find('.po-body').html();
//     },
//
//     container: 'body',
//     placement: 'right'
//
// });
//
//
// $(".tooltip-examples a").tooltip({
//     placement: 'top'
// });
//
//
//
// $('#myTabContent').slimscroll({
//     height: '130px',
//     size: '3px',
//     color: '#D84A38',
//     opacity: 1
//
// });
// $('#slim1').slimscroll({
//     height: '100px',
//     size: '3px',
//     color: '#D84A38',
//
//     opacity: 1
//
// });
// $('#slim2').slimscroll({
//     height: '120px',
//     size: '3px',
//     color: '#35AA47',
//     opacity: 1
// });
// $('#slim3').slimscroll({
//     height: '100px',
//     size: '3px',
//     color: '#FE6A0A',
//     opacity: 1
// });





$(document).ready(function () {
    console.log($('.active'));
    console.log($('.panel-heading li.active').attr('id') == 'tab_tobeapproved');

    $('#button_unapprove').hide();

    window.ApprovalNotes = {};
    window.ToApproveIds = new Set();
    window.ApprovedIds = new Set();

    // if (ToApproveIds.size == 0)
    // {
    //     $('#button_approve').prop('disabled', true);
    // }


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // attach application approval note form
    var modals = $('.modal-body');
    modals.append(
        '<div class="row">'
        + '<div class="col-md-12">'
        + '<label>Approval Note</label>'
        + '<textarea style="width: 100%;" rows="10"></textarea>'
    );







});



$(document).on('click', '#float-card', function () {

    var currentCardId = $(this).attr('data-target').split('_')[1];


    if (ToApproveIds.has(currentCardId))
    {
        $('.removeFromFolio').show();
        $('.addToFolio').hide();
    }
    else
    {
        $('.removeFromFolio').hide();
        $('.addToFolio').show();
    }



});


$(document).on('click', '.addToFolio', function () {
    var id = $(this).attr('id');
    ToApproveIds.add(id);
    ApprovalNotes[id] = $(this).parent().siblings('.modal-body').children().find('textarea').val();


    //set the card as selected by showing font-awsome check icon

    $('#iconCheck_' + this.id).removeClass('hide');
    if (ToApproveIds.size != 0)
    {
        $('#button_approve').prop('disabled', false);
    }
});


$(document).on('click', '.removeFromFolio', function (e) {
    var id = $(this).attr('id');
    ToApproveIds.delete(id);
    delete ApprovalNotes[id];
    //set the card as selected by showing font-awsome check icon

    $("#iconCheck_" + this.id).addClass('hide');
    if (ToApproveIds.size == 0)
    {
        $('#button_approve').prop('disabled', true);
    }
});


$(document).on('click', '#button_approve', function(){
    console.log(ApprovalNotes);
    var data = {'ids': [...ToApproveIds], 'notes': ApprovalNotes};
    $.ajax({
        type: 'post',
        url: $('#button_approve').attr('data-ajax--url'),
        data: data,
        dataType: 'json',
        success: function (returned_data) {
            console.log(returned_data);
            $('#tab1 .row').html(returned_data.submitted_application_cards);
            $('#tab2 .row').html(returned_data.approved_application_cards);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            var e = window.open();
            e.document.write(xhr.responseText);
        }
    });


});