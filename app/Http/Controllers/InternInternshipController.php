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
	    return view('frontend.internship_assignments.internship_selection');
	}

	/**
	 * Return HTML code for ajax refresh
	 * @param Request $request
	 * @return string
	 */
    public function ajaxGetAssignmentToSubmit(Request $request)
    {

        $internship = InternInternship::find($request->internship_id)
            ->load('application', 'journals', 'reflection', 'siteEvaluation');

	    // hasMany, so no need to use get()
        $journals = $internship->journals->where('intern_journal_submitted_on', NULL);
	    // hasOne, so get() is necessary, or only returns a Builder instead of a collection
        $reflection = $internship->reflection->where('intern_reflection_submitted_on', NULL)->get();
        $site_evaluation = $internship->siteEvaluation->where('intern_site_evaluation_submitted_on', NULL)->get();

	    if(empty($reflection))
	    {
		    $reflection = NULL;
	    }
	    else
	    {
		    $reflection = $reflection[0];
	    }

	    if(empty($site_evaluation))
	    {
		    $site_evaluation = NULL;
	    }
	    else
	    {
		    $site_evaluation = $site_evaluation[0];
	    }

        $assignments = $this->packAssignments(compact('journals', 'reflection', 'site_evaluation'));

        return $assignments;
	}






	/*
	 * helpers
	 */
    public function packAssignments(array $assignment_items = [])
    {
        $assignments = '';
        foreach ($assignment_items as $type => $item)
        {
            $assignments .= HTMLSnippet::generateAssignmentItemCollapsePanel($type, $item);
        }

        return $assignments;
	}
}
