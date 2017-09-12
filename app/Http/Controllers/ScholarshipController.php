<?php

namespace App\Http\Controllers;



class ScholarshipController extends Controller
{
    public function index()
    {
        return view('frontend.scholarships.index');
    }
}
