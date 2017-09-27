
$(document).ready(function () {
});




$('#rootwizard').bootstrapWizard({
    'tabClass': 'nav nav-pills',
    'onNext': function(tab, navigation, index) {
        // var $validator = $('#student_evaluation_form').data('bootstrapValidator').validate();
        // return $validator.isValid();
        return true;
    },
    onTabClick: function(tab, navigation, index) {
        return false;
    },
    onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index+1;
        var $percent = ($current/$total) * 100;

        // If it's the last tab then hide the last button and show the finish instead
        if($current >= $total) {
            $('#rootwizard').find('.pager .next').hide();
            $('#rootwizard').find('.pager .finish').show();
            $('#rootwizard').find('.pager .finish').removeClass('disabled');
        } else {
            $('#rootwizard').find('.pager .next').show();
            $('#rootwizard').find('.pager .finish').hide();
        }

    }});



$(document).on('click', '#rootwizard .finish', function () {

    console.log('finish button is clicked');
    // population modal with recommendation text
    var content = $('#recommendation_content').val();
    $('#recommendation_preview_modal_body').html(content);
    // toggle the modal
    $('#recommendation_preview_modal').modal('toggle');

});


$(document).on('click', '#recommendation_submit_button', function () {
    var form = $('#dean_scholarship_recommendation_form');
    form.submit();
});