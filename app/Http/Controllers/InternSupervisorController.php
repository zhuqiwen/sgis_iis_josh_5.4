<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class InternSupervisorController extends Controller
{
    //
	public function identityCheckView(Request $request)
	{
		return view('frontend.supervisor_student_evaluation.identity_check');
	}

	public function validateIdentity(Request $request)
	{

	}

	public function submitStudentEvaluation(Request $request)
	{

	}
}
