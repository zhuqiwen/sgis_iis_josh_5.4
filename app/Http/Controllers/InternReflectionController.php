<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class InternReflectionController extends InternAssignmentController
{
    //
	public function ajaxSubmit(Request $request)
	{
		return parent::ajaxUpdate($request, 'reflection');
	}

}
