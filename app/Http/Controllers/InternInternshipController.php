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

		$internships = new InternInternship();
		// internship_id => object(internship)
		$internship_options = $internships->getApprovedNotClosedInternshipsByApplicantId($request->user()->id);
		$internship_panels_submitted = $this->getInternshipCollapsePanels($internship_options);
		foreach ($internship_options as $key => $option)
		{
			$internship_info = '';
			$internship_info .= $option->application->intern_application_year . ', ';
			$internship_info .= $option->application->intern_application_term . ', ';
			$internship_info .= $option->application->intern_application_country;
			$internship_options[$key] = $internship_info;
		}


	    return view('frontend.internship_assignments.internship_selection')
		    ->withInternshipPanelsSubmitted($internship_panels_submitted)
		    ->withInternshipOptions($internship_options);
	}




	//helpers
	public function getInternshipCollapsePanels($internships_key_by_id)
	{
		//first

		$content = '';
		foreach ($internships_key_by_id as $key => $internship)
		{

			//hasMany
			$journals = $internship->journals
				->where('intern_journal_submitted_on', '<>', NULL)
				->where('internship_id', $key)
				->all();
			// hasOne
			$reflection = $internship->reflection
				->where('intern_reflection_submitted_on', '<>', NULL)
				->where('internship_id', $key)
				->first();
//				->get()
//				->all();
			$site_evaluation = $internship->siteEvaluation
				->where('intern_site_evaluation_submitted_on', '<>', NULL)
				->where('internship_id', $key)
				->first();
//				->get()
//				->all();

			$content .= HTMLSnippet::generateInternshipCollapsePanelWithSubmittedAssignments($internship, $journals, $reflection, $site_evaluation);
		}

		return $content;
	}



	public function ajaxGetInternshipPanelsWithSubmitAssignments(Request $request)
	{
        $internships = new InternInternship();
        // internship_id => object(internship)
        $internship_options = $internships->getApprovedNotClosedInternshipsByApplicantId($request->user()->id);
        return $this->getInternshipCollapsePanels($internship_options);
	}







}
