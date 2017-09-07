<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AlumEngagementIndicator
 */
class AlumEngagementIndicator extends Model
{
    protected $table = 'alum_engagement_indicators';

    public $timestamps = true;

    protected $fillable = [
        'engagement_indicator_name'
    ];

    protected $guarded = ['id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];


	public function contacts()
	{
		return $this->belongsToMany('App\Models\AlumContact', 'alum_engagements', 'engagement_indicator_id', 'contact_id');
	}
}