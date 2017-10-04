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


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


});



$(document).on('click', '#float-card', function () {

    // var currentCardId = $(this).attr('data-target').split('_')[1];
    //
    //
    // if (ToApproveIds.has(currentCardId))
    // {
    //     $('.removeFromFolio').show();
    //     $('.addToFolio').hide();
    // }
    // else
    // {
    //     $('.removeFromFolio').hide();
    //     $('.addToFolio').show();
    // }



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


$(document).on('click', '#button_forward', function () {
    console.log('forward button is clicked');



});