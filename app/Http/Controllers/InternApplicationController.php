<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InternApplicationController extends Controller
{
    //

    public function ajaxStore(Request $request)
    {
	    return json_encode($request->all());
    }
}
