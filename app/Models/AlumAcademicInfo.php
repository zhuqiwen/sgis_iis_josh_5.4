<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AlumAcademicInfo
 */
class AlumAcademicInfo extends Model
{
    protected $table = 'alum_academic_info';

    public $timestamps = true;

    protected $fillable = [
        'class-year',
        'degree',
        'contact_id',
        'field_id'
    ];

    protected $guarded = [];


	public function contact()
	{
		return $this->belongsTo('App\Models\AlumContact', 'contact_id');
	}

	public function studyField()
	{
		return $this->belongsTo('App\Models\AlumStudyField', 'study_field_id');
	}
}