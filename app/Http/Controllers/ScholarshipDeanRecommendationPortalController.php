<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipDeanRecommendationPortal;
use Illuminate\Http\Request;

class ScholarshipDeanRecommendationPortalController extends Controller
{
    public function identityCheckView($random_url)
    {
        $portal = new ScholarshipDeanRecommendationPortal();

        $exist = $portal->where('random_url', $random_url)
	        ->where('recommendation_submitted', 0)
	        ->exists();

        if(!$exist)
        {
            return view('frontend.url_not_exist');
        }

        $answer = $portal->getIdentityCheckData($random_url);


	    $recommender_first_name = [];
	    $recommender_last_name = [];
	    $recommender_email = [];
	    $recommender_department = [];
	    $applicant_first_name = [];

	    $faker = \Faker\Factory::create();

	    $departments = array_values(config('constants.sgis_departments'));

	    foreach ($departments as $department)
	    {
		    $recommender_department[$department] = $department;

	    }

	    for($i = 0; $i < 3; $i++)
	    {
		    $recommender_fn = $faker->firstName();
		    $applicant_fn = $faker->firstName();
		    $recommender_ln = $faker->lastName();
		    $fake_email = $faker->email();


		    $recommender_first_name[$recommender_fn] = $recommender_fn;
		    $recommender_last_name[$recommender_ln] = $recommender_ln;
		    $recommender_email[$fake_email] = $fake_email;
		    $applicant_first_name[$applicant_fn] = $applicant_fn;
	    }

	    $recommender_first_name[$answer['recommender_first_name']] = $answer['recommender_first_name'];
	    $recommender_last_name[$answer['recommender_last_name']] = $answer['recommender_last_name'];
	    $recommender_email[$answer['recommender_email']] = $answer['recommender_email'];
	    $applicant_first_name[$answer['applicant_first_name']] = $answer['applicant_first_name'];

	    $recommender_first_name = $this->shuffle_assoc($recommender_first_name);
	    $recommender_last_name = $this->shuffle_assoc($recommender_last_name);
	    $recommender_email = $this->shuffle_assoc($recommender_email);
	    $recommender_department = $this->shuffle_assoc($recommender_department);
	    $applicant_first_name = $this->shuffle_assoc($applicant_first_name);


	    return view('frontend.scholarships.recommendation.dean.identity_check')
		    ->withOptions(compact('recommender_first_name', 'recommender_last_name', 'recommender_email', 'recommender_department', 'applicant_first_name'));



    }

    public function validateIdentity(Request $request)
    {
	    $portal = new ScholarshipDeanRecommendationPortal();
	    $exist = $portal->checkIdentity($request);

	    $random_url = explode('/', URL::previous());
	    $random_url = end($random_url);

	    $portal = $portal->where('random_url', $random_url)
		    ->where('recommendation_submitted', 0)
		    ->first();


	    if($exist)
	    {

		    return view('frontend.scholarships.recommendation.dean.recommendation_form')
			    ->withPortalId($portal->id)
			    ->withDeanApplicationId($portal->dean_application_id);

	    }
	    else
	    {
		    $request->session()->flash('error', 'Invalid Personal Information');

		    return back();
	    }
    }

	public function submitRecommendation(Request $request)
	{
		
    }





	//helpers
	private function shuffle_assoc($list)
	{
		if (!is_array($list)) return $list;

		$keys = array_keys($list);
		shuffle($keys);
		$random = array();
		foreach ($keys as $key)
			$random[$key] = $list[$key];

		return $random;
	}
}
