<?php
/**
 * Created by PhpStorm.
 * User: zqw
 * Date: 8/20/17
 * Time: 09:44
 */

return [
	'menu_path' => [
		'front_end' => [
			'internship_create_application' => '/create_internship_application',
			'internship_application_status' => '/internship_application_status',
			'internship_assignments' => '/internship_assignments',
			'internship_timeline' => '/timeline',

			'funding_overseas_internship' => '/funding/internship',
			'funding_scholarships' => '/funding/scholarships',
		],
		'back_end' => [],
	],

    'current_time_zone' => 'America/New_York',


    'journal_interval' => 7,

    'journal_buffer' => 15,
    'reflection_buffer' => 15,
    'site_evaluation_buffer' => 15,
    'student_evaluation_buffer' => 15,

	'ajax' => [
		'urls' => [
			'approve_internship_application' => '/admin/approve_internship_applications',
            'get_internship_assignments' => '/internship/assignment/get',
            'submit_internship_assignment_journal' => '/submit/assignment/journal',
            'submit_internship_assignment_reflection' => '/submit/assignment/reflection',
            'submit_internship_assignment_site_evaluation' => '/submit/assignment/site_evaluation',
            'submit_internship_assignment_student_evaluation' => '/submit/assignment/student_evaluation',
		],
	],

	'forms' => [
		'ids' => [
			'approve_internship_applications' => 'approve_applications_form',
		],
	],

];