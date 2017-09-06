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

	return [
		"contact_salutation" => $faker->title($gender),
		"contact_first_name" => $faker->firstName($gender),
		"contact_middle_name" => NULL,
		"contact_last_name" => $faker->lastName,
		"contact_email" => $faker->email,
		"contact_phone_home" => $faker->tollFreePhoneNumber,
		"contact_phone_mobile"=> $faker->tollFreePhoneNumber,
		"contact_country" => $faker->country,
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