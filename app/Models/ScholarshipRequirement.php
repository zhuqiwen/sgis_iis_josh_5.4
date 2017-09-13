<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AlumAcademicInfo
 */
class ScholarshipRequirement extends Model
{
    protected $table = 'scholarship_requirements';

    public $timestamps = true;

    protected $fillable = [
	    "scholarship_id",
	    "requirement_item",
	    "requirement_order",
    ];

    protected $guarded = ['id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

	public function scholarship()
	{
		return $this->belongsTo('App\Models\Scholarship', 'scholarship_id');
	}

}