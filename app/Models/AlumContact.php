<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AlumContact
 */
class AlumContact extends Model
{
    protected $table = 'alum_contacts';

    public $timestamps = true;

    protected $fillable = [
	    "contact_salutation",
	    "contact_first_name",
	    "contact_middle_name",
	    "contact_last_name",
	    "contact_last_name",
	    "contact_age_group",
	    "contact_email",
	    "contact_phone_home",
	    "contact_phone_mobile",
	    "contact_country",
	    "contact_state",
	    "contact_city",
	    "contact_line1",
	    "contact_line2",
	    "contact_zip",
	    "contact_no_email",
	    "contact_no_phone_call",
	    "contact_no_mail",
	    "contact_iuaa_member",
	    "contact_share_with_iuaa",
    ];

    protected $guarded = ['id'];

	use SoftDeletes;

	protected $dates = ['deleted_at'];



	protected $appends = [
		'current_employer_type',
		'event_titles'
	];

	public function events()
	{
		return $this->belongsToMany('App\Models\AlumEvent', 'alum_event_attendance', 'contact_id', 'event_id');
	}

	public function engagementIndicators()
	{
		return $this->belongsToMany('App\Models\AlumEngagementIndicator', 'alum_engagements', 'contact_id', 'engagement_indicator_id');
	}

	public function socialAccounts()
	{
		return $this->hasMany('App\Models\AlumContactSocialAccount', 'contact_id');
	}

	public function academicInfo()
	{
		return $this->hasMany('App\Models\AlumAcademicInfo', 'contact_id');
	}

	public function employments()
	{
		return $this->hasMany('App\Models\AlumEmployment', 'contact_id');
	}

	public function donations()
	{
		return $this->hasMany('App\Models\AlumDonation', 'contact_id');
	}

//
	public function getCurrentEmployerTypeAttribute()
	{
//		$current_employment = $this->employments()->where('employment_end_date', null)->first();
		$current_employment = $this->employments->where('employment_end_date', null)->first();
		if($current_employment)
		{
			$current_employer_id = $current_employment->employer_id;
			$current_employer = AlumEmployer::find($current_employer_id);
//			return AlumEmployerType::find($current_employer->employer_type_id)->employer_type;
			return $current_employer->employerType->employer_type;
		}
		else
		{
			return 'No current employment information';
		}

//		return 'No current employment information';


	}

	public function getEventTitlesAttribute()
	{

		$events = $this->events()->get();
		$string = '';
		foreach ($events as $event)
		{
			$string .= $event->event_name . ' | ';
		}
		return $string;

	}



}