<?php

namespace App\Http\Controllers;

use App\Models\InternApplication;
use App\Models\InternInternship;
use App\Models\InternJournal;
use App\Models\InternOrganization;
use App\Models\InternSupervisor;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InternJournalController extends Controller
{
    //
	public function ajaxUpdate(Request $request)
	{

        return 'from ' . $request->internship_id;
//        return json_encode('from fdafdsafsda');
	}

}
