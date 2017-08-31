$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});


//todo: finish close/archive internship ajax call

$(document).on('click', '#float-card', function () {

});

