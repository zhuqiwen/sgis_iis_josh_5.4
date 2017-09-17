<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AlumAcademicInfo
 */
class Scholarship extends Model
{
    protected $table = 'scholarship_master';

    public $timestamps = true;

    protected $fillable = [
	    "scholarship_introduction",
	    "scholarship_award_amount",
	    "scholarship_admin",
	    "scholarship_deadline",
	    "scholarship_about_donar",
	    "scholarship_notes",
    ];

    protected $guarded = ['id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

	public function criteria()
	{
		return $this->hasOne('App\Models\ScholarshipCriteria', 'scholarship_id');
	}

	public function eligibility()
	{
		return $this->hasMany('App\Models\ScholarshipEligibility', 'scholarship_id');
	}

	public function material()
	{
		return $this->hasMany('App\Models\ScholarshipMaterial', 'scholarship_id');
	}

	public function process()
	{
		return $this->hasMany('App\Models\ScholarshipProcess', 'scholarship_id');
	}

	public function requirement()
	{
		return $this->hasMany('App\Models\ScholarshipRequirement', 'scholarship_id');
	}
}