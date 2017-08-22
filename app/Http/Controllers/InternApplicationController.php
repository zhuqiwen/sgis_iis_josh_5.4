<?php

namespace App\Http\Controllers;

use app\Helpers\HTMLSnippet;
use App\Models\InternApplication;
use App\Models\InternOrganization;
use App\Models\InternSupervisor;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InternApplicationController extends Controller
{
    // front end user's functionalities
	public function showApplicationStatus(Request $request)
	{
		$applications = new InternApplication();
		$submitted_applications = $applications->getSubmittedApplicationsByApplicantId($request->user()->id);

		return view('internship_application_status')->withSubmittedApplications($submitted_applications);
	}

    public function ajaxStore(Request $request)
    {
	    if($request->isMethod('post'))
	    {

		    $organization = InternOrganization::firstOrCreate([
		    	'intern_organization_name' => $request->intern_organization_name,
		    	'intern_organization_url' => $request->intern_organization_url,
		    	'intern_organization_type' => $request->intern_organization_type,
		    ]);

		    $supervisor = InternSupervisor::firstOrCreate([
			    "intern_supervisor_first_name" => $request->intern_supervisor_first_name,
			    "intern_supervisor_last_name" => $request->intern_supervisor_last_name,
			    "intern_supervisor_prefix" => $request->intern_supervisor_prefix,
			    "intern_supervisor_email" => $request->intern_supervisor_email,
			    "intern_supervisor_phone_country_code" => $request->intern_supervisor_phone_country_code,
			    "intern_supervisor_phone" => $request->intern_supervisor_phone,
			    "intern_organization_id" => $organization->id,

		    ]);

		    $request->request->add(['intern_application_submitted_date' => Carbon::now('America/New_York')->toDateString()]);
		    $application = InternApplication::create($request->all());
		    $application->organization()->associate($organization);
		    $application->supervisor()->associate($supervisor);
		    $applicant = User::find($request->user()->id);
		    $application->applicant()->associate($applicant);

	    }

	    return json_encode($application);

    }





    // admin's functionalities
    public function adminIndexSubmittedApplications(Request $request)
    {
        $applications = new InternApplication();
        $submitted_applications = $applications->getSubmittedApplications();

        $submitted_application_cards = '';
        foreach ($submitted_applications as $application)
        {
            $submitted_application_cards .= HTMLSnippet::generateApplicationFloatCardWithModal($application);

        }

        return view('admin.internships.applications.submitted_applications')
            ->withSubmittedApplicationCards($submitted_application_cards);
    }
}
