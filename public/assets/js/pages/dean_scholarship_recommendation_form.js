// bootstrap wizard//
// $("#gender, #gender1").select2({
//     theme:"bootstrap",
//     placeholder:"",
//     width: '100%'
// });



$(document).ready(function () {
    // set min defaults for depart date, return date, start date and end date
    var yyyy = $('#intern_application_year').val() + '-01-01';
    setMinDate(yyyy);

    $('#intern_application_budget_airfare').attr('min', 0);
});




$('#rootwizard').bootstrapWizard({
    'tabClass': 'nav nav-pills',
    'onNext': function(tab, navigation, index) {
        var $validator = $('#student_evaluation_form').data('bootstrapValidator').validate();
        return $validator.isValid();
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

    // population modal with recommendation text
    // toggle the modal

});


$(document).on('click', '#recommendation_submit_button', function () {
    var form = $('#dean_scholarship_recommendation_form');
    form.submit();
});