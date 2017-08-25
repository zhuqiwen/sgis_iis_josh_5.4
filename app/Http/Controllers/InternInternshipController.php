<?php

namespace App\Http\Controllers;

use app\Helpers\HTMLSnippet;
use App\Models\InternApplication;
use App\Models\InternInternship;
use App\Models\InternOrganization;
use App\Models\InternSupervisor;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InternInternshipController extends Controller
{
    //
	public function showAssignmentView(Request $request)
	{
		$applications = new InternApplication();
		$applications = $applications->getApprovedApplicationsByApplicantId($request->user()->id);

		$approved_application_ids = [];
		foreach ($applications as $application)
		{
			array_push($approved_application_ids, $application->id);
		}

		$internship_options = InternInternship::whereIN('application_id', $approved_application_ids)
			->get()
			->load('application')
			->keyBy('id')->all();
		foreach ($internship_options as $key => $option)
		{
			$internship_info = '';
			$internship_info .= $option->application->intern_application_year . ', ';
			$internship_info .= $option->application->intern_application_term . ', ';
			$internship_info .= $option->application->intern_application_country;
			$internship_options[$key] = $internship_info;
		}




	    return view('frontend.internship_assignments.internship_selection')
		    ->withInternshipOptions($internship_options);
	}



	public function ajaxSubmitAssignments(Request $request)
	{
		return 'hahahah';

	}







}
