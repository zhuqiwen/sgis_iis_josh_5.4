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



	public function ajaxSubmitAssignments(Request $request)
	{
		return 'hahahah';

	}







}
