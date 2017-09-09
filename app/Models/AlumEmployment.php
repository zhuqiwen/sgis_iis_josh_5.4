<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AlumEmployment
 */
class AlumEmployment extends Model
{
    protected $table = 'alum_employments';

    public $timestamps = true;

    protected $fillable = [
        'job_title',
        'country',
        'state',
        'city',
        'contact_id',
        'employer_id'
    ];

    protected $guarded = [];



	public function contact()
	{
		return $this->belongsTo('App\Models\AlumContact', 'contact_id');
	}

	public function employer()
	{
		return $this->belongsTo('App\Models\AlumEmployer', 'employer_id');
	}


}