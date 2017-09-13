<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AlumAcademicInfo
 */
class ScholarshipProcess extends Model
{
    protected $table = 'scholarship_process';

    public $timestamps = true;

    protected $fillable = [
	    "scholarship_id",
	    "process_order",
	    "process_content",

    ];

    protected $guarded = ['id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

	public function scholarship()
	{
		return $this->belongsTo('App\Models\Scholarship', 'scholarship_id');
	}

}