<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InternOrganization
 */
class InternOrganization extends Model
{
    protected $table = 'intern_organizations';

    public $timestamps = true;

    protected $fillable = [
	    "intern_organization_name",
	    "intern_organization_url",
	    "intern_organization_type",
    ];

    protected $guarded = ['id'];

	use SoftDeletes;

	protected $dates = ['deleted_at'];


	public function supervisors()
	{
		return $this->hasMany('App\Models\InternSupervisor', 'intern_organization_id');
	}

	public function internshipApplication()
	{
		return $this->hasMany('App\Models\InternApplication', 'intern_organization_id');
	}


}