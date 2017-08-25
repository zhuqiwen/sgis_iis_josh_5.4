<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class InternSiteEvaluationController extends InternAssignmentController
{
    //
	public function ajaxSubmit(Request $request)
	{
		return parent::ajaxUpdate($request, 'site_evaluation');
	}

}
