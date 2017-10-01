<?php
include_once 'web_builder.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::pattern('slug', '[a-z0-9- _]+');

Route::group(array('prefix' => 'admin'), function () {

    # Error pages should be shown without requiring login
    Route::get('404', function () {
        return View('admin/404');
    });
    Route::get('500', function () {
        return View::make('admin/500');
    });

    Route::post('secureImage', array('as' => 'secureImage','uses' => 'JoshController@secureImage'));

    # Lock screen
    Route::get('{id}/lockscreen', array('as' => 'lockscreen', 'uses' =>'UsersController@lockscreen'));
    Route::post('{id}/lockscreen', array('as' => 'lockscreen', 'uses' =>'UsersController@postLockscreen'));

    # All basic routes defined here
    Route::get('login', array('as' => 'login', 'uses' => 'AuthController@getSignin'));
    Route::get('signin', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
    Route::post('signin', 'AuthController@postSignin');
    Route::post('signup', array('as' => 'signup', 'uses' => 'AuthController@postSignup'));
    Route::post('forgot-password', array('as' => 'forgot-password', 'uses' => 'AuthController@postForgotPassword'));
    Route::get('login2', function () {
        return View::make('admin/login2');
    });

    # Register2
    Route::get('register2', function () {
        return View::make('admin/register2');
    });
    Route::post('register2', array('as' => 'register2', 'uses' => 'AuthController@postRegister2'));

    # Forgot Password Confirmation
    Route::get('forgot-password/{userId}/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
    Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

    # Logout
    Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

    # Account Activation
    Route::get('activate/{userId}/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {
    # Dashboard / Index
//    Route::get('/', array('as' => 'dashboard','uses' => 'JoshController@showHome'));
    Route::get('/', array('as' => 'dashboard','uses' => 'SGISIISAdminController@showHome'));

    // GUI Crud Generator
    Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');
    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');
    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

    # User Management
    Route::group(array('prefix' => 'users'), function () {
        Route::get('/', array('as' => 'users', 'uses' => 'UsersController@index'));
        Route::get('data',['as' => 'users.data', 'uses' =>'UsersController@data']);
        Route::get('create', 'UsersController@create');
        Route::post('create', 'UsersController@store');
        Route::get('{user}/delete', array('as' => 'users.delete', 'uses' => 'UsersController@destroy'));
        Route::get('{user}/confirm-delete', array('as' => 'users.confirm-delete', 'uses' => 'UsersController@getModalDelete'));
        Route::get('{user}/restore', array('as' => 'restore/user', 'uses' => 'UsersController@getRestore'));
        Route::get('{user}', array('as' => 'users.show', 'uses' => 'UsersController@show'));
        Route::post('{user}/passwordreset', array('as' => 'passwordreset', 'uses' => 'UsersController@passwordreset'));
    });
    Route::resource('users', 'UsersController');

    Route::get('deleted_users',array('as' => 'deleted_users','before' => 'Sentinel', 'uses' => 'UsersController@getDeletedUsers'));

    # Group Management
    Route::group(array('prefix' => 'groups'), function () {
        Route::get('/', array('as' => 'groups', 'uses' => 'GroupsController@index'));
        Route::get('create', array('as' => 'groups.create', 'uses' => 'GroupsController@create'));
        Route::post('create', 'GroupsController@store');
        Route::get('{group}/edit', array('as' => 'groups.edit', 'uses' => 'GroupsController@edit'));
       // Route::post('{group}/edit', 'GroupsController@update');
        Route::get('{group}/delete', array('as' => 'groups.delete', 'uses' => 'GroupsController@destroy'));
        Route::get('{group}/confirm-delete', array('as' => 'groups.confirm-delete', 'uses' => 'GroupsController@getModalDelete'));
        Route::get('{group}/restore', array('as' => 'groups.restore', 'uses' => 'GroupsController@getRestore'));
    });

    Route::resource('groups', 'GroupsController');

    /*routes for blog*/
    Route::group(array('prefix' => 'blog'), function () {
        Route::get('/', array('as' => 'blogs', 'uses' => 'BlogController@index'));
        Route::get('create', array('as' => 'blog.create', 'uses' => 'BlogController@create'));
        Route::post('create', 'BlogController@store');
        Route::get('{blog}/edit', array('as' => 'blog.edit', 'uses' => 'BlogController@edit'));
        Route::post('{blog}/edit', 'BlogController@update');
        Route::get('{blog}/delete', array('as' => 'blog.delete', 'uses' => 'BlogController@destroy'));
        Route::get('{blog}/confirm-delete', array('as' => 'blog.confirm-delete', 'uses' => 'BlogController@getModalDelete'));
        Route::get('{blog}/restore', array('as' => 'blog.restore', 'uses' => 'BlogController@restore'));
        Route::get('{blog}/show', array('as' => 'blog.show', 'uses' => 'BlogController@show'));
        Route::post('{blog}/storecomment', 'BlogController@storeComment');
    });

    /*routes for blog category*/
    Route::group(array('prefix' => 'blogcategory'), function () {
        Route::get('/', array('as' => 'blogcategories', 'uses' => 'BlogCategoryController@index'));
        Route::get('create', array('as' => 'blogcategory.create', 'uses' => 'BlogCategoryController@create'));
        Route::post('create', 'BlogCategoryController@store');
        Route::get('{blogCategory}/edit', array('as' => 'blogcategory.edit', 'uses' => 'BlogCategoryController@edit'));
        Route::post('{blogCategory}/edit', 'BlogCategoryController@update');
        Route::get('{blogCategory}/delete', array('as' => 'blogcategory.delete', 'uses' => 'BlogCategoryController@destroy'));
        Route::get('{blogCategory}/confirm-delete', array('as' => 'blogcategory.confirm-delete', 'uses' => 'BlogCategoryController@getModalDelete'));
        Route::get('{blogCategory}/restore', array('as' => 'blogcategory.restore', 'uses' => 'BlogCategoryController@getRestore'));
    });

    /*routes for file*/
    Route::group(array('prefix' => 'file'), function () {
        Route::post('create', 'FileController@store');
        Route::post('createmulti', 'FileController@postFilesCreate');
        Route::delete('delete', 'FileController@delete');
    });

    Route::get('crop_demo', function () {
        return redirect('admin/imagecropping');
    });
    Route::post('crop_demo','JoshController@crop_demo');

    /* laravel example routes */
    # datatables
    Route::get('datatables', 'DataTablesController@index');
    Route::get('datatables/data', array('as' => 'datatables.data', 'uses' => 'DataTablesController@data'));

    # editable datatables
    Route::get('editable_datatables', 'EditableDataTablesController@index');
    Route::get('editable_datatables/data', array('as' => 'editable_datatables.data', 'uses' => 'EditableDataTablesController@data'));
    Route::post('editable_datatables/create','EditableDataTablesController@store');
    Route::post('editable_datatables/{id}/update', 'EditableDataTablesController@update');
    Route::get('editable_datatables/{id}/delete', array('as' => 'admin.editable_datatables.delete', 'uses' => 'EditableDataTablesController@destroy'));

    # custom datatables
    Route::get('custom_datatables', 'CustomDataTablesController@index');
    Route::get('custom_datatables/sliderData', array('as' => 'admin.custom_datatables.sliderData', 'uses' => 'CustomDataTablesController@sliderData'));
    Route::get('custom_datatables/radioData', array('as' => 'admin.custom_datatables.radioData', 'uses' => 'CustomDataTablesController@radioData'));
    Route::get('custom_datatables/selectData', array('as' => 'admin.custom_datatables.selectData', 'uses' => 'CustomDataTablesController@selectData'));
    Route::get('custom_datatables/buttonData', array('as' => 'admin.custom_datatables.buttonData', 'uses' => 'CustomDataTablesController@buttonData'));
    Route::get('custom_datatables/totalData', array('as' => 'admin.custom_datatables.totalData', 'uses' => 'CustomDataTablesController@totalData'));

    //tasks section
    Route::post('task/create', 'TaskController@store');
    Route::get('task/data', 'TaskController@data');
    Route::post('task/{task}/edit', 'TaskController@update');
    Route::post('task/{task}/delete', 'TaskController@delete');


    //sgis internship management
    Route::get('approve_internship_applications', 'InternApplicationController@adminIndexSubmittedApplications');
    Route::post('approve_internship_applications', 'InternApplicationController@ajaxApproveApplications');


    Route::get('archive_internships', 'InternInternshipController@adminIndexFinishedInternships');
    Route::post('archive_internships', 'InternInternshipController@ajaxArchiveInternship');





	// Alum module
	// Alum Study Fields
	Route::get('alum_study_fields/getColumns', 'AlumStudyFieldController@getColumnsForDataTables');
	Route::get('alum_study_fields/data', 'AlumStudyFieldController@data');
	Route::resource('alum_study_fields', 'AlumStudyFieldController');

	// Alum Contacts
	Route::get('alum_contacts/getColumns', 'AlumContactController@getColumnsForDataTables');
	Route::get('alum_contacts/data', 'AlumContactController@data');
	Route::get('alum_contacts/{country}', 'AlumContactController@contactsInCountryView');
	Route::get('alum_contacts/{country}/getColumns', 'AlumContactController@getColumnsForDataTables');
	Route::get('alum_contacts/{country}/data', 'AlumContactController@contactsInCountryData');
	Route::resource('alum_contacts', 'AlumContactController');

    // Alum Employer Types
    Route::get('alum_employer_types/getColumns', 'AlumEmployerTypeController@getColumnsForDataTables');
    Route::get('alum_employer_types/data', 'AlumEmployerTypeController@data');
    Route::resource('alum_employer_types', 'AlumEmployerTypeController');

    // Alum Engagement Indicators
    Route::get('alum_engagement_indicators/getColumns', 'AlumEngagementIndicatorController@getColumnsForDataTables');
    Route::get('alum_engagement_indicators/data', 'AlumEngagementIndicatorController@data');
    Route::resource('alum_engagement_indicators', 'AlumEngagementIndicatorController');

    // Alum Engagement Indicators
    Route::get('alum_events/getColumns', 'AlumEventController@getColumnsForDataTables');
    Route::get('alum_events/data', 'AlumEventController@data');
    Route::resource('alum_events', 'AlumEventController');



	// Scholarships module
	// Scholarships
	Route::get('scholarships/getColumns', 'ScholarshipController@getColumnsForDataTables');
	Route::get('scholarships/data', 'ScholarshipController@data');

	Route::resource('scholarships', 'ScholarshipController');


	// Scholarships module
	// Scholarship_eligibility
	Route::get('scholarship_eligibility/getColumns', 'ScholarshipEligibilityController@getColumnsForDataTables');
	Route::get('scholarship_eligibility/data', 'ScholarshipEligibilityController@data');
	Route::resource('scholarship_eligibility', 'ScholarshipEligibilityController');

	// Scholarships module
	// Scholarship_material
	Route::get('scholarship_material/getColumns', 'ScholarshipMaterialController@getColumnsForDataTables');
	Route::get('scholarship_material/data', 'ScholarshipMaterialController@data');
	Route::resource('scholarship_material', 'ScholarshipMaterialController');


	// Scholarships module
	// Scholarship_process
	Route::get('scholarship_process/getColumns', 'ScholarshipProcessController@getColumnsForDataTables');
	Route::get('scholarship_process/data', 'ScholarshipProcessController@data');
	Route::resource('scholarship_process', 'ScholarshipProcessController');


	// Scholarships module
	// Scholarship_requirement
	Route::get('scholarship_requirement/getColumns', 'ScholarshipRequirementController@getColumnsForDataTables');
	Route::get('scholarship_requirement/data', 'ScholarshipRequirementController@data');
	Route::resource('scholarship_requirement', 'ScholarshipRequirementController');


    //sgis scholarship management
    Route::get('scholarship_deans', 'ScholarshipDeanController@adminCardIndexSubmittedApplications');




	// pdf viewer
	Route::get('doc/dean_scholarship/{record_id}/transcript', array('as' => 'dean_scholarship_transcript', 'uses' => 'PDFController@deanScholarshipTranscript'));









	Route::get('{name?}', 'JoshController@showView');

});

#FrontEndController
Route::get('404', function () {
    return View('frontend.url_not_exist');
});
Route::get('500', function () {
    return View::make('admin/500');
});

Route::get('login', array('as' => 'login','uses' => 'FrontEndController@getLogin'));
Route::post('login','FrontEndController@postLogin');
Route::get('register', array('as' => 'register','uses' => 'FrontEndController@getRegister'));
Route::post('register','FrontEndController@postRegister');
Route::get('activate/{userId}/{activationCode}',array('as' =>'activate','uses'=>'FrontEndController@getActivate'));
Route::get('forgot-password',array('as' => 'forgot-password','uses' => 'FrontEndController@getForgotPassword'));
Route::post('forgot-password','FrontEndController@postForgotPassword');
# Forgot Password Confirmation
Route::get('forgot-password/{userId}/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'FrontEndController@getForgotPasswordConfirm'));
Route::post('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@postForgotPasswordConfirm');


# My account display and update details
Route::group(array('middleware' => 'user'), function () {
    Route::get('my-account', array('as' => 'my-account', 'uses' => 'FrontEndController@myAccount'));
    Route::put('my-account', 'FrontEndController@update');

    //sgis front end routes

    Route::get('internship_application_status', 'InternApplicationController@showApplicationStatus');
    Route::get('internship_assignments', 'InternInternshipController@showAssignmentView');
    Route::get('scholarships', ['as' => 'frontend_scholarships_index', 'uses' => 'ScholarshipController@frontendIndex']);
    Route::get('scholarships/apply/{scholarship_id}', 'ScholarshipController@applicationForm');
    Route::post('scholarships/apply/{scholarship_id}', 'ScholarshipController@submitScholarshipApplication');


    //ajax
    Route::get(config('constants.ajax.urls.get_internship_assignments'), 'InternInternshipController@ajaxGetAssignmentToSubmit');
    Route::post(config('constants.menu_path.front_end.internship_create_application'), 'InternApplicationController@ajaxStore');
    // ajax: submit internship assignment
	Route::put(config('constants.ajax.urls.submit_internship_assignment_journal'), 'InternJournalController@ajaxSubmit');
	Route::put(config('constants.ajax.urls.submit_internship_assignment_reflection'), 'InternReflectionController@ajaxSubmit');
	Route::put(config('constants.ajax.urls.submit_internship_assignment_site_evaluation'), 'InternSiteEvaluationController@ajaxSubmit');

	// ajax: get submitted assignments grouped by internships
    Route::get(config('constants.ajax.urls.get_submitted_assignments_grouped_by_internship'), 'InternInternshipController@ajaxGetInternshipPanelsWithSubmitAssignments');




});

// thank you
Route::get('thank_you', ['as' => 'thank_you', 'uses' => function(){
	return view('frontend.thank_you');
}]);

# Supervisor portal

//for test; disable after work
Route::get('supervisor/student_evaluation', function (){
	return view('frontend.supervisor_student_evaluation.student_evaluation_form');
});

Route::post('supervisor/validate', ['as' => 'supervisor_identity_check', 'uses' => 'InternSupervisorController@validateIdentity']);
Route::post('supervisor/student_evaluation', ['as' => 'submit_student_evaluation', 'uses' => 'InternSupervisorController@submitStudentEvaluation']);
//Route::get('supervisor/thank_you', function (){
//	return view('frontend.supervisor_student_evaluation.thank_you');
//});
Route::get('supervisor/{random_url}', 'InternSupervisorController@identityCheckView');


# scholarship recommendation portal

//deans scholarship recommendation

Route::post('dean_scholarship_recommendation/recommendation', ['as' => 'submit_dean_scholarship_recommendation', 'uses' => 'ScholarshipDeanRecommendationPortalController@submitRecommendation']);
//Route::get('dean_scholarship_recommendation/thank_you', ['as' => 'thank_you', 'uses' => function(){
//	return view('frontend.scholarships.recommendation.thank_you');
//}]);
Route::post('dean_scholarship_recommendation/validate', ['as' => 'dean_scholarship_recommender_identity_check', 'uses' => 'ScholarshipDeanRecommendationPortalController@validateIdentity']);
Route::get('dean_scholarship_recommendation/{random_url}', 'ScholarshipDeanRecommendationPortalController@identityCheckView');





Route::get('logout', array('as' => 'logout','uses' => 'FrontEndController@getLogout'));
# contact form
Route::post('contact',array('as' => 'contact','uses' => 'FrontEndController@postContact'));

#frontend views
Route::get('/', array('as' => 'home', function () {
//    return View::make('index');
    return view('index');
}));



Route::get('blog', array('as' => 'blog', 'uses' => 'FrontendBlogController@index'));
Route::get('blog/{slug}/tag', 'FrontendBlogController@getBlogTag');
Route::get('blogitem/{slug?}', 'FrontendBlogController@getBlog');
Route::post('blogitem/{blog}/comment', 'FrontendBlogController@storeComment');





Route::get('{name?}', 'JoshController@showFrontEndView');
Route::get('test', function (){
	return 'this is a test route';
});





# End of frontend views
