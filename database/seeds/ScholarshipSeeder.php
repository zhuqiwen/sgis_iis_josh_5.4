<?php

use Illuminate\Database\Seeder;

use App\Models\Scholarship;
use App\Models\ScholarshipCriteria;
use App\Models\ScholarshipEligibility;
use App\Models\ScholarshipMaterial;
use App\Models\ScholarshipProcess;
use App\Models\ScholarshipRequirement;


class ScholarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    Scholarship::truncate();
	    $this->command->info('scholarship table emptied successfully.');

	    ScholarshipCriteria::truncate();
	    $this->command->info('scholarship_criteria table emptied successfully.');

	    ScholarshipEligibility::truncate();
	    $this->command->info('scholarship_eligibility table emptied successfully.');

	    ScholarshipMaterial::truncate();
	    $this->command->info('scholarship_materials table emptied successfully.');

	    ScholarshipProcess::truncate();
	    $this->command->info('scholarship_process table emptied successfully.');

	    ScholarshipRequirement::truncate();
	    $this->command->info('scholarship_requirements table emptied successfully.');


	    // Anderson
	    $anderson_introduction = <<<END
This scholarship supports current, full-time undergraduates at SGIS who participate in IU-approved, credit-bearing overseas study experiences.
The overseas study program can be for a summer, a semester, or an academic year.
END;

	    $anderson_donor = <<<END
This scholarship was established through the generosity of IU alumnus Harold Anderson. Harold studied history in the College of Arts and Sciences. He also joined Sigma Pi Fraternity and played on the IU basketball team in 1925–26. Harold taught history and coached basketball in the Madison County area, and later returned to IU and graduated from the IU Maurer School of Law. He was a distinguished lawyer for many years in Anderson, Indiana.
END;

        // Fielding
        $fielding_introduction = <<<END
This scholarship supports current, full-time undergraduates in the School of Global and International Studies who participate in IU-approved, credit-bearing overseas study experiences.
The overseas study program can be for a summer, a semester, or an academic year
END;
        $fielding_donor = <<<END
        This scholarship was established through the generosity of IU alumnus James D. Fielding and his family. Jim studied political science in the College of Arts and Sciences. His study abroad experience in Copenhagen, Denmark, profoundly influenced him. He notes that the experience has had a significant impact on his ability to work for global companies and to successfully engage in a great deal of international business.
Jim’s career has largely been focused on retail, and has included positions as president of Disney Stores Worldwide and CEO of Claire’s Stores. He is currently global head of consumer products and retail for a subsidiary of DreamWorks in Los Angeles.
END;


        //Albright
        $albright_website = '<a href="http://www.indiana.edu/~global/" target="_blank">their website</a>';
        $albright_introduction = <<<END
Established to honor Dr. Albright’s passion for international affairs and dedication to mentoring students, the David E. Albright Memorial Scholarship will recognize a full-time School of Global and International Studies student with a commitment to international issues.
This scholarship is administered by the Center for the Study of Global Change. Please see $albright_website for complete eligibility requirements and application process details.
END;

        $albright_donor = <<<END
        This scholarship was established through the generosity of IU alumnus James D. Fielding and his family. Jim studied political science in the College of Arts and Sciences. His study abroad experience in Copenhagen, Denmark, profoundly influenced him. He notes that the experience has had a significant impact on his ability to work for global companies and to successfully engage in a great deal of international business.
Jim’s career has largely been focused on retail, and has included positions as president of Disney Stores Worldwide and CEO of Claire’s Stores. He is currently global head of consumer products and retail for a subsidiary of DreamWorks in Los Angeles.
END;

        //direct admit
        $direct_admit_introduction = <<<END
Travel grants to offset the cost of overseas study and international internship/research will be provided to SGIS direct admit students who have matriculated in 2013, 2014, or 2015. Students must meet the eligibility requirements at the time they wish to receive the grant.
END;

        $direct_admin_application_form = '<a href="https://iu.app.box.com/s/d2ajbl2h6y4au8wpxqwzvl6qvhrq1pjj" target="_blank">the SGIS Direct Admit Travel Grant Application</a>';
        $direct_admin_application_email = '<a href="mailto:sgisgrnt@indiana.edu">sgisgrnt@indiana.edu</a>';
        $direct_admin_process = <<<END
There is no specific application deadline. However, students are strongly advised to fill out $direct_admin_application_form at least a month prior to their intended overseas study/international experience. Complete applications should be emailed to $direct_admin_application_email.
END;

        //dean
        $dean_introduction = <<<END
Established to assist SGIS students with a record of academic excellence to pursue impactful internship experiences in the U.S. and abroad in summer.
Preference will be given to National Endowment for Democracy (NED) internship applicants.
Applicants should register their internship to qualify for funding. Award amounts vary and they are not renewable
END;

        $dean_criteria = <<<END
Promise of a productive learning experience as indicated by intellectual capacity reflected in grades and faculty recommendation
Significance in alignment of educational and career goals (InternshipRegistrationForm)
Feasibility and clarity of proposed budget (InternshipRegistrationForm)
END;








        $scholarships = [
            "anderson" => [
                'title' => "Anderson Overseas Study SGIS Scholarship",
                'introduction' => $anderson_introduction,
                'award' => "Award amounts vary.",
                'admin' => 1,
                'deadline' => "2017-10-20",
                'donor' => $anderson_donor,
                'type' => array_keys(config('constants.scholarship_types'))[1],
                'criteria' => null,
                'eligibility' => [
                    0 => "Be officially enrolled as a full-time undergraduate student (minimum 12 credit hours) with a major in SGIS at the time you apply",
                    1 => "Have a minimum cumulative GPA of 3.00 at the time you apply",
                    2 => "Have been accepted to participate in an IU-approved, credit-bearing overseas study program",
                ],
                'material' => [
                    0 => "Your Resume in PDF",
                ],
                'process' => [
                    0 => "Finish and submit the scholarship application, during which you need to upload your resume in PDF as well.",
                    1 => "Confirm that your recommenders will receive an email requesting them to submit recommendation online for you.",

                ],
                'requirement' => [],
            ],
            "fielding" => [
                'title' => 'James D. Fielding Family Study Abroad Scholarship',
                'introduction' => $fielding_introduction,
                'award' => "Award amounts vary.",
                'admin' => 1,
                'deadline' => "2017-10-20",
                'donor' => $fielding_donor,
                'type' => array_keys(config('constants.scholarship_types'))[1],
                'criteria' => null,
                'eligibility' => [
                    0 => "Be officially enrolled as a full-time undergraduate student (minimum 12 credit hours) with a major in SGIS at the time you apply",
                    1 => "Have a minimum cumulative GPA of 3.00 at the time you apply",
                    2 => "Have been accepted to participate in an IU-approved, credit-bearing overseas study program",
                ],
                'material' => [
                    0 => "Your Resume in PDF",
                ],
                'process' => [
                    0 => "Finish and submit the scholarship application, during which you need to upload your resume in PDF as well.",
                    1 => "Confirm that your recommenders will receive an email requesting them to submit recommendation online for you.",

                ],
                'requirement' => [],
            ],
            "albright" => [
                'title' => 'David E. Albright Memorial Scholarship',
                'introduction' => $albright_introduction,
                'award' => '$1,000.00',
                'admin' => 1,
                'deadline' => '2017-03-03',
                'donor' => null,
                'type' => array_keys(config('constants.scholarship_types'))[2],
                'criteria' => null,
                'eligibility' => [],
                'material' => [],
                'process' => [],
                'requirement' => [],
            ],
            "direct_admit" => [
                'title' => 'SGIS Direct Admit Travel Grant',
                'introduction' => $direct_admit_introduction,
                'award' => null,
                'admin' => 1,
                'deadline' => null,
                'donor' => null,
                'type' => array_keys(config('constants.scholarship_types'))[2],
                'criteria' => null,
                'eligibility' => [],
                'material' => [],
                'process' => [
                    0 => $direct_admin_process,
                ],
                'requirement' => [],
            ],
            "dean" => [
                'title' => 'Dean’s Scholarship',
                'introduction' => $dean_introduction,
                'award' => 'Award amounts vary.',
                'admin' => 1,
                'deadline' => '2017-03-03 17:00:00',
                'donor' => null,
                'type' => array_keys(config('constants.scholarship_types'))[0],
                'criteria' => $dean_criteria,
                'eligibility' => [
                    0 => 'Undergraduate or graduate student',
                    1 =>  'Minimum GPA: 3.2',
                    2 =>  'Proof of acceptance to a summer internship program (preference to N.E.D. applicants)',
                ],
                'material' => [
                    0 => 'IUB unofficial transcript',
                    1 => 'Assumption of Risk and Release of Liability, if applicable',
                ],
                'process' => [
                    0 => 'Finish and submit an summer internship application',
                    1 => 'Contact your recommender from SGIS faculty',
                    2 => 'Finish and submit Dean\'s Scholarship application, during which you will be asked to upload required materials',
                    3 => 'After the internship, submit internship journals, reflection, and site evaluations online',
                ],
                'requirement' => [],
            ],
        ];

        foreach ($scholarships as $scholarship)
        {
            factory(Scholarship::class)->create([
                "scholarship_title" => $scholarship['title'],
                "scholarship_introduction" => $scholarship['introduction'],
                "scholarship_award_amount" => $scholarship['award'],
                "scholarship_admin" => $scholarship['admin'],
                "scholarship_deadline" => $scholarship['deadline'],
                "scholarship_about_donar" => $scholarship['donor'],
                "scholarship_type" => $scholarship['type'],

            ])->each(function ($s) use ($scholarship){
                factory(ScholarshipCriteria::class)->create([
                    "scholarship_id" => $s->id,
                    "criteria_content" => $scholarship['criteria'],
                ]);

                foreach ($scholarship['eligibility'] as $key => $item)
                {
                    factory(ScholarshipEligibility::class)->create([
                        "scholarship_id" => $s->id,
                        "eligibility_order" => $key + 1 ,
                        "eligibility_item" => $item,
                    ]);
                }


                foreach ($scholarship['material'] as $key => $item)
                {
                    factory(ScholarshipMaterial::class)->create([
                        "scholarship_id" => $s->id,
                        "material_item" => $item,
                        "material_order" => $key + 1,
                    ]);
                }

                foreach ($scholarship['process'] as $key => $item)
                {
                    factory(ScholarshipProcess::class)->create([
                        "scholarship_id" => $s->id,
                        "process_order" => $key + 1,
                        "process_item" => $item,
                    ]);
                }


                foreach ($scholarship['requirement'] as $key => $item)
                {
                    factory(ScholarshipRequirement::class)->create([
                        "scholarship_id" => $s->id,
                        "requirement_item" => $item,
                        "requirement_order" => $key + 1,
                    ]);
                }

            });
        }

    }

    /**
     * @param $num_scholarships
     * populate the scholarship tables with random content
     * need to be called in run()
     */
    protected function randomScholarships($num_scholarships)
    {
	    factory(Scholarship::class, $num_scholarships)->create()
		    ->each(function ($s){
		    	//criteria
			    factory(ScholarshipCriteria::class)->create(['scholarship_id' => $s->id]);

			    //eligibility
			    for($i = 1 ; $i <= random_int(1, 5); $i++)
			    {
				    factory(ScholarshipEligibility::class)->create([
				    	'eligibility_order' => $i,
				    	'scholarship_id' => $s->id,
					    ]);
			    }
			    //material
			    for($i = 1 ; $i <= random_int(1, 5); $i++)
			    {
				    factory(ScholarshipMaterial::class)->create([
					    'material_order' => $i,
					    'scholarship_id' => $s->id,
				    ]);
			    }
			    //process
			    for($i = 1 ; $i <= random_int(1, 5); $i++)
			    {
				    factory(ScholarshipProcess::class)->create([
					    'process_order' => $i,
					    'scholarship_id' => $s->id,
				    ]);
			    }
			    //requirement
			    for($i = 1 ; $i <= random_int(1, 5); $i++)
			    {
				    factory(ScholarshipRequirement::class)->create([
					    'requirement_order' => $i,
					    'scholarship_id' => $s->id,
				    ]);
			    }
		    });
    }
}
