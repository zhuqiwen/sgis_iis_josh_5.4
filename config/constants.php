<?php
/**
 * Created by PhpStorm.
 * User: zqw
 * Date: 8/20/17
 * Time: 09:44
 */

$dean_scholarship_package_email =<<<END
Suspendisse sapien libero, consequat a odio quis, posuere tempus dolor. Vestibulum interdum magna ex, a tempor leo luctus non. Vivamus porta, lacus a finibus semper, dolor odio volutpat leo, et pharetra ipsum ex at enim. Vestibulum molestie ultricies est nec tempor. Praesent pellentesque nulla nec mi rhoncus, sed condimentum mi condimentum. Nam volutpat massa ut mattis consectetur. Fusce nisi nibh, bibendum ut purus vitae, malesuada commodo tortor. Curabitur efficitur massa nisi, id rutrum nulla cursus a. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam sagittis viverra sagittis. Aenean porta nisi sed sapien laoreet cursus. In hac habitasse platea dictumst. Ut sollicitudin volutpat imperdiet. In massa mauris, dignissim vel ullamcorper at, bibendum vel ligula. Sed nunc mi, aliquet ac velit quis, aliquam ultrices mi. Ut dapibus porta nibh nec molestie.

Nulla facilisi. Integer ultricies sit amet leo vel sagittis. Phasellus odio purus, accumsan ut tincidunt et, lacinia vel urna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer cursus felis ac finibus dapibus. Curabitur enim dui, accumsan et libero sit amet, ultricies rhoncus arcu. Suspendisse gravida nisl urna, sollicitudin tempus nisi aliquam non. Aliquam lacinia massa vel tortor ultrices, sed maximus libero sodales. Mauris sit amet consequat dui, ultricies sodales dui. Nam eu tellus nulla. Mauris et pharetra tortor, eget lobortis purus. Quisque vel augue eu massa varius molestie.
END;

return [
	'menu_path' => [
		'front_end' => [
			'internship_create_application' => '/create_internship_application',
			'internship_application_status' => '/internship_application_status',
			'internship_assignments' => '/internship_assignments',
			'internship_timeline' => '/timeline',

			'scholarships_index' => '/scholarships',
			'funding_overseas_internship' => '/overseas_study_scholarships',
			'funding_scholarships' => '/other_scholarships',

			'others_stories' => '/experiences',
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
			//alum
			// study field
			'study_field_creation_form' => 'study_field_creation_form',
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

	'tables' => [
		'alum_contacts' => [
			'age_groups' => [
				'21-25',
				'26-30',
				'31-35',
				'36-40',
				'41-45',
				'46-50',
				'51-55',
				'56-60',
				'61-65',
				'66-70',
				'71-75',
				'76-80',
				'81-85',
				'86-90',
				'91-95',
				'96-100',
				'100+',
			],
		],
	],

	'scholarship_types' => [
		'summer' => 'Summer Internship Scholarships',
		'overseas' => 'Overseas Study Scholarships',
		'other' => 'Other Scholarships',
	],


	'sgis_departments' => [
		'Central Eurasian Studies' => 'Central Eurasian Studies',
		'East Asian Languages and Cultures' => 'East Asian Languages and Cultures',
		'International Studies' => 'International Studies',
		'Near Eastern Languages and Cultures' => 'Near Eastern Languages and Cultures',
	],

    'email_notification_types' => [
        'dean_scholarship_application' => 'dean_scholarship_application',
    ],

	'scholarship_file_path' => [
		'dean_scholarship' => 'scholarship/dean/',
	],


    'committee_contacts' => [
        'dean_scholarship' => [
            'email' => 'dean_scholarship_committee@iu.edu',
        ],
    ],



    'notification_emails' => [
        'dean_scholarship' => [
            'to_committee' => [
                "to" => 'dean_scholarship_committee@iu.edu',
                "body" => $dean_scholarship_package_email,
            ],
            'to_applicant' => [],
        ],
    ],
];