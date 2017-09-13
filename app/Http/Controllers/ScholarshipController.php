<?php

namespace App\Http\Controllers;



class ScholarshipController extends Controller
{
    public function frontendIndex()
    {
        return view('frontend.scholarships.index');
    }

	public function applicationForm($scholarship_name)
	{

		$view = 'frontend.scholarships.application_forms.' . $scholarship_name;
		return view($view);
    }
}
