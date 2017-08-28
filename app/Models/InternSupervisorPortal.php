<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;


/**
 * Class InternSupervisor
 */
class InternSupervisorPortal extends Model
{
    protected $table = 'intern_supervisor_portal';

    public $timestamps = true;

    protected $fillable = [
	    "random_url",
	    "supervisor_id",
	    "internship_id",
	    "form_submitted",
	    "num_visit",
    ];

    protected $guarded = ['id'];

	use SoftDeletes;

	protected $dates = ['deleted_at'];


	public function supervisor()
	{
		return $this->belongsTo('App\Models\InternSupervisor', 'supervisor_id');
	}

	public function internship()
	{
		return $this->belongTo('App\Models\InternInternship', 'internship_id');
	}



	public function getIdentityCheckData($random_url)
	{
		$portal = $this->where('random_url', $random_url)
					->whereNull('deleted_at')
					->first()
					->load('supervisor');

		$supervisor = $portal->supervisor->getAttributes();

		$application = InternInternship::find($portal->internship_id)
			->load('application')
			->application;

		$applicant = User::find($application->user_id)->getAttributes();
		return array_merge($supervisor, $applicant);

	}


	public function checkIdentity(Request $request)
	{
		$random_url = explode('/', $request->path());
		$random_url = end($random_url);
		$answers = $this->getIdentityCheckData($random_url);

		$result = true;

		foreach ($request->except(['_token']) as $key => $answer)
		{
			if($request->input($key) != $answers[$key])
			{
				$result = false;
			}
		}

		return $result;



	}
}