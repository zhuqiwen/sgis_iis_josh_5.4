<?php

namespace App\Http\Controllers;

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
	public function showAssignments(Request $request)
	{



	    return view('frontend.internship_assignments.internship_selection');


	}

}
