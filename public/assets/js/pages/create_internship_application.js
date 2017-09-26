// bootstrap wizard//
$("#gender, #gender1").select2({
    theme:"bootstrap",
    placeholder:"",
    width: '100%'
});

function setMinDate(date) {
    $('#intern_application_depart_date').attr('min', date).attr('val', date);
    $('#intern_application_return_date').attr('min', date).attr('val', date);
    $('#intern_application_start_date').attr('min', date).attr('val', date);
    $('#intern_application_end_date').attr('min', date).attr('val', date);
}

function hideDepartAndReturnDates(){
    var date = "1111-11-11";
    $('#intern_application_depart_date').attr('value', date).hide();
    $('#intern_application_return_date').attr('value', date).hide();
    $('label[for="intern_application_depart_date"]').hide();
    $('label[for="intern_application_return_date"]').hide();
}

$(document).ready(function () {
    // set min defaults for depart date, return date, start date and end date
    var yyyy = $('#intern_application_year').val() + '-01-01';
    setMinDate(yyyy);

    $('#intern_application_budget_airfare').attr('min', 0);
});

$(document).on('change','#intern_application_year', function () {
    var yyyy = $(this).val();
    var today = new Date();
    var currentYYYY = today.getFullYear();
    if(yyyy == currentYYYY)
    {
        var dd = today.getDate() < 10 ? '0' + today.getDate() : today.getDate();
        var mm = today.getMonth() + 1 ? '0' + (today.getMonth() + 1) : today.getMonth() + 1;
        var minDate = yyyy + '-' + mm + '-' + dd;

    }
    else
    {
        var minDate = yyyy + '-01-01';
    }
    setMinDate(minDate);

});
$(document).on('change', '#country-select', function () {
    var country = $(this).val();

    if(country.toLowerCase() == 'United States'.toLowerCase())
    {
        console.log('country is US');
        hideDepartAndReturnDates();
    }
});
$(document).on('change', '#intern_application_start_date', function () {
    var start_date = $(this).val();

    $('#intern_application_end_date').attr('min', start_date);
});
$(document).on('change', '#intern_application_depart_date', function () {
    var depart_date = $(this).val();

    $('#intern_application_return_date').attr('min', depart_date);
});

$(document).on('focusout', 'input[type="number"]', function () {
    if($(this).val() < 0)
    {
        console.log('negative number detected');
        $(this).val('0');
        console.log('new val is: ' + $(this).val());
    }
});



$("#internship_application_form").bootstrapValidator({
    fields: {
        intern_organization_name: {
            validators: {
                notEmpty: {
                    message: 'The Organization name is required'
                }
            },
            required: true
            // minlength: 3
        },
        intern_supervisor_first_name: {
            validators: {
                notEmpty: {
                    message: 'Supervisor\'s first name is required'
                }
            },
            required: true
        },
        intern_supervisor_last_name: {
            validators: {
                notEmpty: {
                    message: 'Supervisor\'s first name is required'
                }
            },
            required: true
        },
        intern_supervisor_email: {
            validators: {
                notEmpty: {
                    message: 'The email address is required'
                },
                emailAddress: {
                    message: 'The input is not a valid email address'
                }
            }
        },
        intern_supervisor_phone_country_code:{
            validators:{
                numeric: {
                    message: 'Please do not include any characters other than numbers'
                },
                notEmpty: {
                    message: 'Country code is required'
                }
            }
        },
        intern_supervisor_phone: {
            validators: {
                numeric: {
                    message: 'Please do not include any characters other than numbers'
                },
                notEmpty: {
                    message: 'Phone number is required'
                }
            }
        },
        intern_application_state: {
            validators: {
                notEmpty: {
                    message: 'The State/Province field is required'
                }
            }
        },
        intern_application_city: {
            validators: {
                notEmpty: {
                    message: 'The City field is required'
                }
            }
        },
        intern_application_street: {
            validators: {
                notEmpty: {
                    message: 'The Street field is required'
                }
            }
        },

        //
    }
});
$('#acceptTerms').on('ifChanged', function(event){
    $('#internship_application_form').bootstrapValidator('revalidateField', $('#acceptTerms'));
});
$('#rootwizard').bootstrapWizard({
    'tabClass': 'nav nav-pills',
    'onNext': function(tab, navigation, index) {
        var $validator = $('#internship_application_form').data('bootstrapValidator').validate();
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

$('input[type="checkbox"].custom-checkbox, input[type="radio"].custom-radio').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue',
    increaseArea: '20%'
});

$(document).on('click', '#rootwizard .finish', function () {
    var form = $('#internship_application_form');
    console.log(form.attr('action'));
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        dataType: 'json',
        success: function (returned_data) {
            console.log(returned_data);
            var next = '/internship_application_status';
            if ($('#intern_application_term').val() == 'Summer')
            {
                if (confirm('You just submitted a summer internship application. There is scholarship for summer internship. Would you like to check it?'))
                {

                    var current_url = window.location.pathname.split('/');
                    next = current_url.slice(0, -1).join('/') + '/scholarships/apply/5';
                }
            }
            window.location.replace(next);

        },
        error: function (xhr, ajaxOptions, thrownError) {
            var e = window.open();
            e.document.write(xhr.responseText);

        }
    })
});