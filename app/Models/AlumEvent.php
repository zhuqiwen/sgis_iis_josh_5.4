<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AlumEvent
 */
class AlumEvent extends Model
{
    protected $table = 'alum_events';

    public $timestamps = true;

    protected $fillable = [
        'event_name',
        'event_date',
        'event_country',
        'event_state',
        'event_city',
        'event_location',
    ];

    protected $guarded = ['id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

	protected $appends = [
	];



	public function contacts()
	{
		return $this->belongsToMany('App\Models\AlumContact', 'alum_event_attendance', 'event_id', 'contact_id');
    }


}