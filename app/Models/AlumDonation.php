<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AlumContact
 */
class AlumDonation extends Model
{
    protected $table = 'alum_donations';

    public $timestamps = true;

    protected $fillable = [
	    "contact_id",
	    "donation_date",
	    "donation_form",
	    "donation_amount",
	    "donation_sum",
	    "donation_note",
    ];

    protected $guarded = ['id'];

	use SoftDeletes;

	protected $dates = ['deleted_at'];



	protected $appends = [
	];


	public function contacts()
	{
		return $this->belongsTo('App\Models\AlumContact', 'contact_id');
	}


}