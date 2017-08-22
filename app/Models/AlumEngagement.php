<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AlumEngagement
 */
class AlumEngagement extends Model
{
    protected $table = 'alum_engagements';

    public $timestamps = true;

    protected $fillable = [
        'contact_id',
        'indicator_id'
    ];

    protected $guarded = [];

        
}