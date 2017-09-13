<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AlumAcademicInfo
 */
class ScholarshipEligibility extends Model
{
    protected $table = 'scholarship_eligibility';

    public $timestamps = true;

    protected $fillable = [
	    "scholarship_id",
	    "eligibility_order",
	    "eligibility_content",

    ];

    protected $guarded = ['id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

	public function scholarship()
	{
		return $this->belongsTo('App\Models\Scholarship', 'scholarship_id');
	}

}