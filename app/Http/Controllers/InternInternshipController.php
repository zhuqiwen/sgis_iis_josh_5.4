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
	    $internships = new InternInternship();
	    $finished_internships = $internships->getFinishedInternshipsByApplicantId($request->user()->id);

	    return view('internship_assignments')
            ->withFinishedInternships($finished_internships);


	}

}
