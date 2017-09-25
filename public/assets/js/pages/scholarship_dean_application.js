// bootstrap wizard//
$("#gender, #gender1").select2({
    theme:"bootstrap",
    placeholder:"",
    width: '100%'
});



$(document).ready(function () {

    console.log(summer_intern_applications[0].intern_application_term);
    var summer_intern_options = '<select id="internship_select" name="intern_application_id">';

    for (var i = 0; i < summer_intern_applications.length; i++)
    {
        summer_intern_options += '<option value="';
        summer_intern_options +=  summer_intern_applications[i].id;
        summer_intern_options += '">' + summer_intern_applications[i].intern_application_year;
        summer_intern_options += ', ' + summer_intern_applications[i].intern_application_term;
        summer_intern_options += ', in ' + summer_intern_applications[i].intern_application_country;
        summer_intern_options += '</option>'
    }
    summer_intern_options += '</select>';

    console.log($('#summer_internships_selection_div'));
    $('#summer_internships_selection_div').html(summer_intern_options);
    $('#internship_select')[0].selectedIndex = -1;

    console.log($('#internship_select').val());
});

$(document).on('change','#internship_select', function () {
    console.log($(this).val());
    // console.log(summer_intern_applications);
    var selected_internship = summer_intern_applications.find(o => o.id == $(this).val());
    // console.log(selected_internship);
    var internship_content = '';
    $.each(selected_internship, function (key, value) {
        // console.log(key);
        // console.log(value);
        internship_content += value + '<br>';
    });
    $('#internship_verification_div').html(internship_content);

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
        // var $validator = $('#internship_application_form').data('bootstrapValidator').validate();
        // return $validator.isValid();
        if (!$('#internship_select').val())
        {
            alert('you must select an internship to proceed');
            return false;
        }
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
                if (confirm('hey, a summer internship'))
                {
                    next = '/funding_summer_internship';
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