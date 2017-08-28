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

		$faker = Faker\Factory::create();


		$supervisor_first_names = [];
		$supervisor_last_names = [];
		$supervisor_emails = [];
		$supervisor_phones = [];
		$student_first_names = [];

		for($i = 0 ; $i < 4; $i++)
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

		$supervisor_first_names = [
			$answer['intern_supervisor_first_name'] => $answer['intern_supervisor_first_name']
		];
		$supervisor_last_names = [
			$answer['intern_supervisor_last_name'] => $answer['intern_supervisor_last_name']
		];
		$supervisor_emails = [
			$answer['intern_supervisor_email'] => $answer['intern_supervisor_email']
		];
		$supervisor_phones = [
			$answer['intern_supervisor_phone'] => $answer['intern_supervisor_phone']
		];
		$student_first_names = [
			$answer['first_name'] => $answer['first_name']
		];
		$options = [
			'supervisor_first_names' => shuffle($supervisor_first_names),
			'supervisor_last_names' => shuffle($supervisor_last_names),
			'supervisor_emails' => shuffle($supervisor_emails),
			'supervisor_phones' => shuffle($supervisor_phones),
			'student_first_names' => shuffle($student_first_names),
		];

		dd($options);

		return view('frontend.supervisor_student_evaluation.identity_check')
			->withOptions($options);
	}

	public function validateIdentity(Request $request)
	{

	}

	public function submitStudentEvaluation(Request $request)
	{

	}
}
