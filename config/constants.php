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
    'internship_close_buffer' => 15,

    'journal_buffer' => 15,
    'reflection_buffer' => 15,
    'site_evaluation_buffer' => 15,
    'student_evaluation_buffer' => 15,

	'ajax' => [
		'urls' => [
			'approve_internship_application' => '/admin/approve_internship_applications',
            'get_internship_assignments' => '/internship/assignment/get',
            'get_submitted_assignments_grouped_by_internship' => '/internship/assignment/get_submitted',
            'submit_internship_assignment_journal' => '/submit/assignment/journal',
            'submit_internship_assignment_reflection' => '/submit/assignment/reflection',
            'submit_internship_assignment_site_evaluation' => '/submit/assignment/site_evaluation',
            'submit_internship_assignment_student_evaluation' => '/submit/assignment/student_evaluation',
            'archive_internships' => '/admin/archive_internships',
		],
	],

	'forms' => [
		'ids' => [
			'approve_internship_applications' => 'approve_applications_form',
			'finalize_internships_form' => 'finalize_internships_form',
			'sgis_internship_final_opinion_form' => 'sgis_internship_final_opinion_form',
		],
	],

	'labels_fields' => [
		'site_evaluation' => [
			"How did you locate this internship?"  => "how_did_locate",
			"Provide brief description of the internship site" => "site_description",
			"What were your tasks and responsibilities as an intern?" => "task_description",
			"How does this internship site fit into the scope of your studies at IU?" => "fit_into_study",
			"What were the strengths of the internship site?" => "site_strength",
			"What were weaknesses of the internship site?" => "site_weakness",
			"What skills and knowledge did you gain by participating in this internship site?" => "gained_skills",
			"Any other brief comment?" => "brief_comment",
			"Would you recommend this internship site?" => "willing_to_recommend",
		],
		'student_evaluation' => [
			"Compared to other current and former interns, how would you rate this student’s overall performance?" => "intern_student_evaluation_performance_comment",
			"How would you rate this student’s overall performance?" => "intern_student_evaluation_performance_rating",
			"Are there any aspects of the student’s performance during the internship that you consider to be particularly noteworthy?" => "intern_student_evaluation_noteworthy_aspects",
			"Did the intern do anything unusually well or put in extra effort in any area?" => "intern_student_evaluation_noteworthy_examples",
			"Are there any aspects of the student’s performance during the internship in which you think the student needs improvement?" => "intern_student_evaluation_weakness",
			"Did the intern do anything poorly?" => "intern_student_evaluation_weakness_examples",
			"How might this be remedied?" => "intern_student_evaluation_weakness_remedy",
			"How would you rate this student’s suitability to a career in your field?" => "intern_student_evaluation_suitability",
			"Please provide any advice that will assist the student in improving his/her preparedness for a permanent, full-time position." => "intern_student_evaluation_job_advice",
			"How would you rate the student’s development during the internship?" => "intern_student_evaluation_development_rating",
		],
	],

    'card_tags' => [
        'missing_assignments' => 'Missing Assignments:',
        'archived' => 'Archived',
    ],

];