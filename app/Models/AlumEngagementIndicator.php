<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AlumEngagementIndicator
 */
class AlumEngagementIndicator extends Model
{
    protected $table = 'alum_engagement_indicators';

    public $timestamps = true;

    protected $fillable = [
        'name'
    ];

    protected $guarded = [];

        
}