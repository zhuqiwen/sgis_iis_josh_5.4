<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AlumContact
 */
class AlumContact extends Model
{
    protected $table = 'alum_contacts';

    public $timestamps = true;

    protected $fillable = [
	    "contact_salutation",
	    "contact_first_name",
	    "contact_middle_name",
	    "contact_last_name",
	    "contact_email",
	    "contact_phone_home",
	    "contact_phone_mobile",
	    "contact_country",
	    "contact_state",
	    "contact_city",
	    "contact_line1",
	    "contact_line2",
	    "contact_zip",
	    "contact_no_email",
	    "contact_no_phone_call",
	    "contact_no_mail",
	    "contact_iuaa_member",
	    "contact_share_with_iuaa",
    ];

    protected $guarded = ['id'];

	use SoftDeletes;

	protected $dates = ['deleted_at'];


	public function events()
	{
		return $this->belongsToMany('App\Models\AlumEvent', 'alum_event_attendance', 'contact_id', 'event_id');
	}



}