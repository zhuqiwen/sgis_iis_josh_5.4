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

    public function ajaxGetAssignmentToSubmit(Request $request)
    {

        $internship = InternInternship::find($request->internship_id)
            ->load('application', 'journals', 'reflection', 'siteEvaluation');

        $journals = $internship->journals;
        $reflection = $internship->reflection;
        $site_evaluations = $internship->siteEvaluation;

        $assignments = $this->packAssignments(compact('journals', 'reflection', 'site_evaluations'));

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
