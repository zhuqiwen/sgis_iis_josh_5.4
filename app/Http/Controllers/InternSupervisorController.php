<?php

namespace App\Http\Controllers;


use App\Models\InternSupervisorPortal;
use Illuminate\Http\Request;

class InternSupervisorController extends Controller
{
    //
	public function identityCheckView(Request $request)
	{
		$portal = new InternSupervisorPortal();
		$random_url = explode('/', $request->path());
		$random_url = end($random_url);
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

	    if($exist)
        {
            return view('frontend.supervisor_student_evaluation.student_evaluation_form');
        }
        else
        {
            $request->session()->flash('error', 'Invalid Personal Information');

            return back();
        }
	}

	public function submitStudentEvaluation(Request $request)
	{

	}


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
