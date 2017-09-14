<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});




$factory->define(App\Models\AlumContact::class, function(Faker\Generator $faker){
	$gender = random_int(2, 3) % 2;
	if($gender == 1)
	{
		$gender = 'male';
	}
	else
	{
		$gender = 'female';
	}

	$age_groups = config('constants.tables.alum_contacts.age_groups');

	if(random_int(0, 9) >= 4)
	{
		$country = 'United States of America';
	}
	else
	{
		$country = $faker->country;
	}
	return [
		"contact_salutation" => $faker->title($gender),
		"contact_first_name" => $faker->firstName($gender),
		"contact_middle_name" => NULL,
		"contact_last_name" => $faker->lastName,
		"contact_age_group" => $age_groups[random_int(0, sizeof($age_groups) - 1)],
		"contact_email" => $faker->email,
		"contact_phone_home" => $faker->tollFreePhoneNumber,
		"contact_phone_mobile"=> $faker->tollFreePhoneNumber,
		"contact_country" => $country,
		"contact_state" => $faker->state,
		"contact_city" => $faker->city,
		"contact_line1" => $faker->streetAddress,
		"contact_line2" => NULL,
		"contact_zip" => $faker->postcode,
		"contact_no_email" => random_int(0, 1),
		"contact_no_phone_call" => random_int(0, 1),
		"contact_no_mail" => random_int(0, 1),
		"contact_iuaa_member" => random_int(0, 1),
		"contact_share_with_iuaa" => random_int(0, 1),

	];
});

$factory->define(App\Models\AlumEvent::class, function (Faker\Generator $faker){

	return [
		"event_name" => $faker->text(random_int(20, 40)),
		"event_date" => $faker->dateTimeBetween('-10 years')->format('Y-m-d'),
		"event_country" => $faker->country,
		"event_state" => $faker->state,
		"event_city" => $faker->city,
		"event_location" => $faker->streetAddress,
	];
});


$factory->define(App\Models\AlumDonation::class, function (Faker\Generator $faker){

	$num_contacts = \App\Models\AlumContact::count();
	if($num_contacts)
	{
		$contact_id = random_int(1, $num_contacts);
	}
	else
	{
		return [];
	}
	return [
		"contact_id" => $contact_id,
		"donation_date" => $faker->date(),
		"donation_form" => $faker->word(),
		"donation_amount" => $faker->word(),
		"donation_sum" => random_int(0, 100000),
		"donation_note" => $faker->text(),
	];
});



$factory->define(App\Models\AlumEmployerType::class, function (Faker\Generator $faker){

	return [
	];
});
$factory->define(App\Models\AlumEmployerType::class, function (Faker\Generator $faker){

	return [
	];
});
$factory->define(App\Models\AlumEmployer::class, function (Faker\Generator $faker){

	$num_employer_types = \App\Models\AlumEmployerType::count();

	if($num_employer_types)
	{
		$employer_type_id = random_int(1, $num_employer_types);
	}
	else
	{
		return [
			"employer" => $faker->company(),
			"employer_url" => $faker->domainName(),
			"employer_type_id" => 1,
		];
	}
	return [
		"employer" => $faker->company(),
		"employer_url" => $faker->domainName(),
		"employer_type_id" => $employer_type_id,
	];
});
$factory->define(App\Models\AlumEmployment::class, function (Faker\Generator $faker){

	$num_employers = \App\Models\AlumEmployer::count();
	$num_contacts = \App\Models\AlumContact::count();

	if($num_employers)
	{
		$employer_id = random_int(1, $num_employers);
	}
	else
	{
		return [];
	}

	if($num_contacts)
	{
		$contact_id = random_int(1, $num_contacts);
	}
	else
	{
		return [];
	}


	return [
		"employment_job_title" => $faker->jobTitle(),
		"employment_country" => $faker->country(),
		"employment_state" => $faker->state(),
		"employment_city" => $faker->city(),
		"employment_start_date" => $faker->date(),
		"employment_end_date" => NULL,
		"contact_id" => $contact_id,
		"employer_id" => $employer_id,

	];
});


	/**
	 * factories for scholar module
	 */
$factory->define(App\Models\Scholarship::class, function (Faker\Generator $faker){

	$user = \App\User::first();
	if($user)
	{
		$user_id = $user->id;
	}
	else
	{
		$user_id = 1;
	}

	return [
		"scholarship_introduction" => "Introduction: " . $faker->text,
		"scholarship_award_amount" => "Award: " . $faker->text(10),
		"scholarship_admin" => $user_id,
		"scholarship_deadline" => $faker->date,
		"scholarship_about_donar" => "Donar: " . $faker->text,
		"scholarship_notes" => "Notes: " . $faker->text,
	];
});
$factory->define(App\Models\ScholarshipCriteria::class, function (Faker\Generator $faker){

	return [
		"criteria_content" => "Criteria: " . $faker->text(50),
	];
});
$factory->define(App\Models\ScholarshipEligibility::class, function (Faker\Generator $faker){

	return [
		"eligibility_content" => "Eligibility: " . $faker->text(50),
	];
});
$factory->define(App\Models\ScholarshipMaterial::class, function (Faker\Generator $faker){

	return [
		"material_item" => "Material: " . $faker->text(50),
	];
});
$factory->define(App\Models\ScholarshipProcess::class, function (Faker\Generator $faker){

	return [
		"process_content" => "Process: " . $faker->text(50),
	];
});
$factory->define(App\Models\ScholarshipRequirement::class, function (Faker\Generator $faker){

	return [
		"requirement_item" => "Requirement: " . $faker->text(50),
	];
});








