<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AlumEmployer
 */
class AlumEmployer extends Model
{
    protected $table = 'alum_employers';

    public $timestamps = true;

    protected $fillable = [
	    "employer",
	    "employer_url",
	    "employer_type_id",
    ];

    protected $guarded = ['id'];

	use SoftDeletes;
	protected $dates = ['deleted_at'];


	public function employments()
	{
		return $this->hasMany('App\Models\AlumEmployment', 'employer_id');
	}

	public function employerType()
	{
		return $this->belongsTo('App\Models\AlumEmployerType', 'employer_type_id');
	}

}