


//todo: finish close/archive internship ajax call

$(document).on('click', '#float-card', function () {

});

$(document).on('click', '.archive_internship_utton', function (e) {
    e.preventDefault();
    var form = $(this.form);
    console.log(form.serialize());
    console.log(form.attr('action'));
    console.log(form.attr('method'));

    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        dataType: 'json',
        success: function (returned_data) {
            $('#tab1 .row').html(returned_data.cards_fiac);
            $('#tab2 .row').html(returned_data.cards_fiai);
            $('#tab3 .row').html(returned_data.cards_ci);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            var e = window.open();
            e.document.write(xhr.responseText);
        }
    });
});

