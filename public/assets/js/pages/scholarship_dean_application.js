// bootstrap wizard//
$("#gender, #gender1").select2({
    theme:"bootstrap",
    placeholder:"",
    width: '100%'
});

var scholarships_index_url = window.location.pathname.split('/').slice(0, -2).join('/');


$(document).ready(function () {

    if (summer_intern_applications.length == 0)
    {
        alert('No available Summer Internship Application');
        // window.location.replace(window.location.pathname.split('/').slice(0, -2).join('/'));
        window.location.replace(scholarships_index_url);
    }
    else
    {
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

    }

});

$(document).on('change','#internship_select', function () {
    console.log($(this).val());
    console.log(summer_intern_applications);
    var selected_internship = summer_intern_applications.find(o => o.id == $(this).val());
    // console.log(selected_internship);
    var internship_organization = '<h4>Internship Organization</h4>';
    internship_organization += '<p><strong>' + selected_internship.organization.intern_organization_name + '</strong></p>' ;
    internship_organization += '<p>It is a <strong>' + selected_internship.organization.intern_organization_type + '</strong></p>' ;
    $('#organization_div').html(internship_organization);

    var internship_supervisor = '<h4>Internship Supervisor</h4>';
    internship_supervisor += '<p><strong>' + selected_internship.supervisor.intern_supervisor_first_name + ' ' + selected_internship.supervisor.intern_supervisor_last_name + '</strong></p>' ;
    internship_supervisor += '<p>Email: <strong>' + selected_internship.supervisor.intern_supervisor_email + '</strong></p>' ;
    $('#supervisor_div').html(internship_supervisor);

    var internship_content = '<h4>Internship Details</h4>';
    internship_content += '<p>This internship is in <strong>' + selected_internship.intern_application_year + '</strong>';
    internship_content += ' in <strong>' + selected_internship.intern_application_term + '</strong> term.</p>';
    internship_content += '<p>in <strong>' + selected_internship.intern_application_city;
    internship_content += ', ' + selected_internship.intern_application_state;
    internship_content += ', ' + selected_internship.intern_application_country + '</strong></p>';
    internship_content += '<p>It starts from <strong>' + selected_internship.intern_application_start_date + '</strong>';
    internship_content += ' , and ends from <strong>' + selected_internship.intern_application_end_date + '</strong></p>';

    $('#internship_div').html(internship_content);


});



$("#scholarship_dean_application_form").bootstrapValidator({
    fields: {
        recommender_first_name: {
            validators: {
                notEmpty: {
                    message: 'The recommendar\'s first name is required'
                }
            },
            required: true
            // minlength: 3
        },
        recommender_last_name: {
            validators: {
                notEmpty: {
                    message: 'The recommendar\'s last name is required'
                }
            },
            required: true
        },
        recommender_email: {
            validators: {
                notEmpty: {
                    message: 'The recommendar\'s email is required'
                },
                emailAddress: {
                    message: 'The input is not a valid email address'
                }
            },
            required: true
        },
        transcript_file_name: {
            validators: {
                notEmpty: {
                    message: 'Please upload your transcript, in the format of PDF'
                },
                file: {
                    extension: 'pdf',
                    type: 'application/pdf',
                    message: 'Only PDF file is accepted'
                }
            }
        }
    }
});

$('#rootwizard').bootstrapWizard({
    'tabClass': 'nav nav-pills',
    'onNext': function(tab, navigation, index) {

        if (!$('#internship_select').val())
        {
            alert('you must select an internship to proceed');
            return false;
        }
        var $validator = $('#scholarship_dean_application_form').data('bootstrapValidator').validate();
        return $validator.isValid();
        // return true;
    },
    onTabClick: function(tab, navigation, index) {
        return false;
    },
    onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index+1;
        var $percent = ($current/$total) * 100;

        // If it's the last tab then hide the last button and show the finish instead
        if($current >= $total && $('#transcript_upload_input').val() != '') {
            $('#rootwizard').find('.pager .next').hide();
            $('#rootwizard').find('.pager .finish').show();
            $('#rootwizard').find('.pager .finish').removeClass('disabled');
        } else {
            $('#rootwizard').find('.pager .next').show();
            $('#rootwizard').find('.pager .finish').hide();
        }

    }});


$(document).on('change', '#transcript_upload_input', function () {
    if ($('#transcript_upload_input').val() != '')
    {
        $('#rootwizard').find('.pager .finish').show();
        $('#rootwizard').find('.pager .finish').removeClass('disabled');
    }
    else
    {
        $('#rootwizard').find('.pager .finish').hide();
    }
});

$(document).on('click', '#rootwizard .finish', function () {
    var form_data = new FormData($('#scholarship_dean_application_form')[0]);
    console.log(window.location.pathname);
    console.log(form_data);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'post',
        url: window.location.pathname,
        data: form_data,
        // dataType: 'json',
        success: function (returned_data) {
            console.log('success');
            alert('application submitted successfully');
            window.location.replace(scholarships_index_url);


        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log('something is wrong');

            var e = window.open();
            e.document.write(xhr.responseText);
            console.log(xhr);

        }
    })
});