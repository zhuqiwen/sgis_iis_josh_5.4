<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AlumAcademicInfo
 */
class ScholarshipDeanRecommendationPortal extends Model
{
    protected $table = 'scholarship_dean_recommendation_portal';

    public $timestamps = true;

    protected $fillable = [
	    "random_url",
	    "dean_application_id",
	    "recommendation_submitted",
        "num_visit",
    ];

    protected $guarded = ['id'];


	public function application()
	{
		return $this->belongsTo('App\Models\ScholarshipApplicationDean', 'dean_application_id');
	}

}