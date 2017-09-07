<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AlumStudyField
 */
class AlumStudyField extends Model
{
    protected $table = 'alum_study_fields';

    public $timestamps = true;

    protected $fillable = [
        'study_field'
    ];

    protected $guarded = [];

	public function academicInfo()
	{
		return $this->hasMany('App\Models\AlumAcademicInfo', 'study_field_id');
	}
}