<?php

namespace App\Models;

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



}