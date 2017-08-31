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


    public function adminIndexFinishedInternships()
    {
//        $internships = new InternInternship();
//        //get data
//        $finished_internships_assignments_complete = $internships->getFinishedUnclosedInternshipsWithAssignmentComplete();
//        $finished_internships_assignments_incomplete = $internships->getFinishedUnclosedInternshipsWithAssignmentIncomplete();
//        $closed_internships = $internships->getFinishedClosedInternships();
//        //make cards: fiac => finished_internships_assignments_complete
//	    $cards_fiac = $this->getFiacCards($finished_internships_assignments_complete);
//	    $cards_fiai = $this->getFiaiCards($finished_internships_assignments_incomplete);
//	    $cards_ci = $this->getCiCards($closed_internships);



        $cards_fiac = $this->generateCardsHtml()['cards_fiac'];
        $cards_fiai = $this->generateCardsHtml()['cards_fiai'];
        $cards_ci = $this->generateCardsHtml()['cards_ci'];
	    return view('admin.internships.finished_internships')
		    ->withCardsFiac($cards_fiac)
		    ->withCardsFiai($cards_fiai)
		    ->withCardsCi($cards_ci);


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



	public function getFiacCards($internships)
	{
		return $this->getInternshipCards($internships, '');
	}


	public function getFiaiCards($internships)
	{
		return $this->getInternshipCards($internships, config('constants.card_tags.missing_assignments'));
	}

	public function getCiCards($internships)
	{
		return $this->getInternshipCards($internships, config('constants.card_tags.archived'));
	}


    public function generateCardsHtml()
    {
        $internships = new InternInternship();
        //get data
        $finished_internships_assignments_complete = $internships->getFinishedUnclosedInternshipsWithAssignmentComplete();
        $finished_internships_assignments_incomplete = $internships->getFinishedUnclosedInternshipsWithAssignmentIncomplete();
        $closed_internships = $internships->getFinishedClosedInternships();
        //make cards: fiac => finished_internships_assignments_complete
        $cards_fiac = $this->getFiacCards($finished_internships_assignments_complete);
        $cards_fiai = $this->getFiaiCards($finished_internships_assignments_incomplete);
        $cards_ci = $this->getCiCards($closed_internships);

        return compact('cards_ci','cards_fiai', 'cards_fiac');

	}


	//
	private function getInternshipCards($internships, $tag)
	{

		$cards = '';
		foreach ($internships as $internship)
		{
			$cards .= HTMLSnippet::generateInternshipFloatCardWithModal($internship, $tag);
		}
//		return 'yoho! just a temporary stub';
		return $cards;
	}

	//ajax
	public function ajaxGetInternshipPanelsWithSubmitAssignments(Request $request)
	{
        $internships = new InternInternship();
        // internship_id => object(internship)
        $internship_options = $internships->getApprovedNotClosedInternshipsByApplicantId($request->user()->id);
        return $this->getInternshipCollapsePanels($internship_options);
	}

    public function ajaxArchiveInternship(Request $request)
    {

        $today = Carbon::today(config('constants.current_time_zone'))->toDateString();
        $request->request->add([
            'intern_internship_case_closed_date' => $today,
            'intern_internship_closed_by' => $request->user()->id,
        ]);

        $result = InternInternship::where('id', $request->internship_id)
            ->update($request->except([
                'internship_id',
            ]));

//        $result = true;
        if($result)
        {
            return json_encode($this->generateCardsHtml());
        }
        else
        {
            return redirect('admin/404');
        }
	}







}
