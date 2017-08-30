<?php

namespace App\Http\Controllers;


use App\Models\InternStudentEvaluation;
use App\Models\InternSupervisorPortal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use function Sodium\randombytes_uniform;

class InternSupervisorController extends Controller
{
    //
	public function identityCheckView(Request $request)
	{
		$portal = new InternSupervisorPortal();
		$random_url = explode('/', $request->path());
		$random_url = end($random_url);

		$exist = $portal->where('random_url', $random_url)->whereNull('deleted_at')->exists();
		if(!$exist)
        {
            return view('frontend.url_not_exist');
        }

		$answer = $portal->getIdentityCheckData($random_url);

		$faker = \Faker\Factory::create();



		$supervisor_first_names = [];
		$supervisor_last_names = [];
		$supervisor_emails = [];
		$supervisor_phones = [];
		$student_first_names = [];

		for($i = 0 ; $i < 3; $i++)
		{
			$sfn = $faker->firstname;
			$student_fn = $faker->firstname;
			$sln = $faker->lastname;
			$email = $faker->companyEmail;
			$phone = $faker->phoneNumber;

			$supervisor_first_names[$sfn] = $sfn;
			$supervisor_last_names[$sln] = $sln;
			$supervisor_emails[$email] = $email;
			$supervisor_phones[$phone] = $phone;
			$student_first_names[$student_fn] = $student_fn;
		}

		$supervisor_first_names[$answer['intern_supervisor_first_name']] = $answer['intern_supervisor_first_name'];
		$supervisor_last_names[$answer['intern_supervisor_last_name']] = $answer['intern_supervisor_last_name'];
		$supervisor_emails[$answer['intern_supervisor_email']] = $answer['intern_supervisor_email'];
		$supervisor_phones[$answer['intern_supervisor_phone']] = $answer['intern_supervisor_phone'];
		$student_first_names[$answer['first_name']] = $answer['first_name'];

		$supervisor_first_names = $this->shuffle_assoc($supervisor_first_names);
		$supervisor_last_names = $this->shuffle_assoc($supervisor_last_names);
		$supervisor_emails = $this->shuffle_assoc($supervisor_emails);
		$supervisor_phones = $this->shuffle_assoc($supervisor_phones);
		$student_first_names = $this->shuffle_assoc($student_first_names);

		$options = [
			'supervisor_first_names' => $supervisor_first_names,
			'supervisor_last_names' => $supervisor_last_names,
			'supervisor_emails' => $supervisor_emails,
			'supervisor_phones' => $supervisor_phones,
			'student_first_names' => $student_first_names,
		];

		return view('frontend.supervisor_student_evaluation.identity_check')
			->withOptions($options);
	}

	public function validateIdentity(Request $request)
	{
	    $portal = new InternSupervisorPortal();
	    $exist = $portal->checkIdentity($request);

		$random_url = explode('/', URL::previous());
		$random_url = end($random_url);

		$portal = $portal->where('random_url', $random_url)
			->whereNull('deleted_at')
			->first();


	    if($exist)
        {
//	        session('internship_id', $portal->internship_id);
//	        session('portal_id', $portal->id);
//	        session('student_evaluation_id', $portal->student_evaluation_id);
            return view('frontend.supervisor_student_evaluation.student_evaluation_form')
//	            ->withInternshipId($portal->internship_id)
	            ->withPortalId($portal->id)
	            ->withStudentEvaluationId($portal->student_evaluation_id);

        }
        else
        {
            $request->session()->flash('error', 'Invalid Personal Information');

            return back();
        }
	}

	public function submitStudentEvaluation(Request $request)
	{
//		$internship_id = $request->internship_id;
		$portal_id = $request->portal_id;
		$student_evaluation_id = $request->student_evaluation_id;

		$student_evaluation = new InternStudentEvaluation();
		$now = Carbon::now(config('constants.current_time_zone'))->toDateString();
		$request->request->add(['intern_student_evaluation_submitted_on' => $now]);
		$exclude = ['_token', 'portal_id', 'student_evaluation_id'];
		$num_affected_rows = $student_evaluation->where('id', $student_evaluation_id)->update($request->except($exclude));

		if($num_affected_rows)
		{
			$portal = new InternSupervisorPortal();
			$portal->where('id', $portal_id)->update(['form_submitted' => 1]);
			//set successful message
			$request->session()->flash('success', 'Student Evaluation submitted successfully. The browser can be safely closed.');
			//redirect thanks page
			return redirect('supervisor/thank_you');
		}
		else
		{
			//set error message
			$request->session()->flash('error', 'Oooops. Something went wrong. Can you try again? Thank you.');
			//redirect to identity check page
            //TODO: develop this redirect
			return 'aho...';
		}

	}


	//helpers
    private function shuffle_assoc($list)
    {
        if (!is_array($list)) return $list;

        $keys = array_keys($list);
        shuffle($keys);
        $random = array();
        foreach ($keys as $key)
            $random[$key] = $list[$key];

        return $random;
	}
}
