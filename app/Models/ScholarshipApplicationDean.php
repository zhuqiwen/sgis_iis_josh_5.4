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
        "forward_to_committee",
	    "transcript_file_name",
    ];

    protected $guarded = ['id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];


    protected $appends = [
        'package_notification',
    ];


	public function recommendationPortal()
	{
		return $this->hasOne('App\Models\ScholarshipDeanRecommendationPortal', 'dean_application_id');
	}

    public function internshipApplication()
    {
        return $this->belongsTo('App\Models\InternApplication', 'intern_application_id');
	}


    public function getPackageNotificationAttribute()
    {
        $type = config('constants.email_notification_types.dean_scholarship_application');
        return Notifications::where('type', $type)
            ->where('type_record_id', $this->id)
            ->first();


	}






}