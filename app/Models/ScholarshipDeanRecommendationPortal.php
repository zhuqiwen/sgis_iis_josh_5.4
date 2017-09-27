<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

/**
 * Class AlumAcademicInfo
 */
class ScholarshipDeanRecommendationPortal extends Model
{
    protected $table = 'scholarship_dean_recommendation_portal';

    public $timestamps = true;

    protected $fillable = [
	    "random_url",
	    "dean_application_id",
	    "recommendation_submitted",
        "num_visit",
    ];

    protected $guarded = ['id'];


	public function application()
	{
		return $this->belongsTo('App\Models\ScholarshipApplicationDean', 'dean_application_id');
	}


    public function getIdentityCheckData($random_url)
    {
        $portal = $this->where('random_url', $random_url)
            ->where('recommendation_submitted', 0)
            ->first();

        $portal = $portal->load('application', 'application.internshipApplication', 'application.internshipApplication.applicant');
        $recommender = $portal->application->getAttributes();
        $applicant = $portal->application->internshipApplication->applicant->getAttributes();

        $answer = [
            "recommender_first_name" => $recommender['recommender_first_name'],
            "recommender_last_name" => $recommender['recommender_last_name'],
            "recommender_email" => $recommender['recommender_email'],
            "recommender_department" => $recommender['recommender_department'],
            "applicant_first_name" => $applicant['first_name'],
        ];
        return $answer;

	}

	public function checkIdentity(Request $request)
	{
		$random_url = explode('/', URL::previous());
		$random_url = end($random_url);
		$answers = $this->getIdentityCheckData($random_url);


		foreach ($request->except(['_token']) as $key => $answer)
		{
			if(strtolower($request->input($key)) != strtolower($answers[$key]))
			{
				return false;
			}
		}

		return true;
	}
}