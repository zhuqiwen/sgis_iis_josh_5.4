<?php

namespace App\Http\Controllers;

use App\Models\InternApplication;
use App\Models\InternInternship;
use App\Models\InternJournal;
use App\Models\InternOrganization;
use App\Models\InternReflection;
use App\Models\InternSiteEvaluation;
use App\Models\InternStudentEvaluation;
use App\Models\InternSupervisor;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InternAssignmentController extends Controller
{
    //
	public function ajaxUpdate(Request $request, $assignment_type)
	{

		$now = Carbon::now(config('constants.current_time_zone'))->toDateString();
		$request->request->add([
			'intern_journal_submitted_on' => $now,
			'intern_reflection_submitted_on' => $now,
			'intern_site_evaluation_submitted_on' => $now,
			'intern_student_evaluation_submitted_on' => $now,
		]);

		if($assignment_type === 'journal')
		{
			$assignment = new InternJournal();
		}
		elseif ($assignment_type === 'reflection')
		{
			$assignment = new InternReflection();

		}
		elseif ($assignment_type === 'site_evaluation')
		{
			$assignment = new InternSiteEvaluation();

		}
		elseif ($assignment_type === 'student_evaluation')
		{
			$assignment = new InternStudentEvaluation();

		}
		else
		{
			return 'Assignment Type Error';
		}

		$assignment->ajaxUpdate($request);



		// here we should pass in internship id into request
		$request->request->add([
			'internship_id' => $assignment->find($request->record_id)->internship_id,
		]);

		return $this->ajaxGetAssignmentToSubmit($request);
	}

}
