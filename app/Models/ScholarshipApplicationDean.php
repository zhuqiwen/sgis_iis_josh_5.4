<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AlumAcademicInfo
 */
class ScholarshipApplicationDean extends Model
{
    protected $table = 'scholarship_application_dean';

    public $timestamps = true;

    protected $fillable = [
	    "intern_application_id",
	    "recommender_first_name",
	    "recommender_last_name",
	    "recommender_prefix",
	    "recommender_email",
	    "recommender_department",
	    "recommender_recommendation",
	    "ferpa_waive",
	    "transcript_file_name",
    ];

    protected $guarded = ['id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

	public function scholarship()
	{
		return $this->belongsTo('App\Models\Scholarship', 'scholarship_id');
	}

}