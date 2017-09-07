<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AlumContact
 */
class AlumContactSocialAccount extends Model
{
    protected $table = 'alum_contact_social_accounts';

    public $timestamps = true;

    protected $fillable = [
	    "contact_id",
	    "account",
	    "type",

    ];

    protected $guarded = ['id'];

	use SoftDeletes;

	protected $dates = ['deleted_at'];


	public function contact()
	{
		return $this->belongsTo('App\Models\AlumContact', 'contact_id');
	}



}