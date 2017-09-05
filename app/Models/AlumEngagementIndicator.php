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

        
}