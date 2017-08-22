<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class InternInternship
 */
class InternInternship extends Model
{
    protected $table = 'intern_internships';

    public $timestamps = true;

    protected $fillable = [
	    "application_id",
	    "intern_internship_application_approval_notes",
	    "intern_internship_final_notes",
	    "intern_internship_x373_hours",
	    "intern_internship_x373_grade",
	    "intern_internship_case_closed_date",
	    "intern_internship_closed_by",
    ];

    protected $guarded = ['id'];

	use SoftDeletes;

	protected $dates = ['deleted_at'];


	public function application()
	{
		return $this->belongsTo('App\Models\InternApplication', 'application_id');
	}

	public function closedBy()
	{
		return $this->belongsTo('App\User', 'intern_internship_closed_by');
	}

    public function journals()
    {
        return $this->hasMany('App\Models\InternJournal', 'internship_id');
	}

    public function reflection()
    {
        return $this->hasOne('App\Models\InternReflection', 'internship_id');
    }

    public function siteEvaluation()
    {
        return $this->hasOne('App\Models\InternSiteEvaluation', 'internship_id');
    }

    public function studentEvaluation()
    {
        return $this->hasOne('App\Models\InternStudentEvaluation', 'internship_id');
    }




	public function getFinishedInternshipsByApplicantId($applicant_id)
    {
        $applications = new InternApplication();
        $finishend_applications = $applications->getFinishedApplicationByApplicantId($applicant_id);
        $application_ids = [];
        foreach ($finishend_applications as $application)
        {
            $application_ids[] = $application->id;
        }

        return $this->whereIn('application_id', $application_ids)
            ->get()
            ->load('journals', 'reflection', 'siteEvaluation', 'studentEvaluation');


    }



}