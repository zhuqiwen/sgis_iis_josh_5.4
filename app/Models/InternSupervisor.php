<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class InternSupervisor
 */
class InternSupervisor extends Model
{
    protected $table = 'intern_supervisors';

    public $timestamps = true;

    protected $fillable = [
	    "intern_supervisor_first_name",
	    "intern_supervisor_last_name",
	    "intern_supervisor_prefix",
	    "intern_supervisor_email",
	    "intern_supervisor_phone_country_code",
	    "intern_supervisor_phone",
	    "intern_organization_id",
    ];

    protected $guarded = ['id'];

	use SoftDeletes;

	protected $dates = ['deleted_at'];


	public function organization()
	{
		return $this->belongsTo('App\Models\InternOrganization', 'intern_organization_id');
	}

	public function internshipApplicatins()
	{
		return $this->hasMany('App\Models\InternApplication', 'intern_supervisor_id');
	}
}